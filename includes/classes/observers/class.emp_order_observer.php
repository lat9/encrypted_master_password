<?php
// -----
// Part of the Encrypted Master Password plugin, provided by lat9@vinosdefrutastropicales.com
//
// @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
//

class emp_order_observer extends base {

  function emp_order_observer() {
    $this->attach($this, array('NOTIFY_ORDER_DURING_CREATE_ADDED_ORDER_COMMENT'));
  }
  
  // -----
  // Monitoring the notifier just after the order-status record for the order has been created.
  // The 'updated_by' field is set to the logged-in EMP admin's name, so long as the field has
  // been previously added to the table.
  //
  function update(&$class, $eventID, $paramsArray) {
    global $db, $sniffer;
    if ($sniffer->field_exists(TABLE_ORDERS_STATUS_HISTORY, 'updated_by') && isset($_SESSION['emp_admin_id'])) {
      $admin_id_sql = 'admin_id = :adminid:';
      $admin_id_sql = $db->bindVars($admin_id_sql, ':adminid:', $_SESSION['emp_admin_id'], 'integer');

      $admin_info = $db->Execute("SELECT admin_name FROM " . TABLE_ADMIN . " WHERE $admin_id_sql LIMIT 1");
      $admin_name = (($admin_info->EOF) ? '' : $admin_info->fields['admin_name']) . ' [' . $_SESSION['emp_admin_id'] . ']';

      $orders_id_sql = 'orders_id = :ordersID';
      $orders_id_sql = $db->bindVars($orders_id_sql, ':ordersID', $paramsArray['orders_id'], 'integer');

      $osh_info = $db->Execute("SELECT MAX(orders_status_history_id) as orders_status_history_id FROM " . TABLE_ORDERS_STATUS_HISTORY . " WHERE $orders_id_sql");
      
      if (!$osh_info->EOF) {
        $db->Execute("UPDATE " . TABLE_ORDERS_STATUS_HISTORY . " SET updated_by = '$admin_name' WHERE orders_status_history_id = " . $osh_info->fields['orders_status_history_id']);
      }
    }
  }
 
}