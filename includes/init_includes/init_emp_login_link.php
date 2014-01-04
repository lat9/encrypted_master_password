<?php
// -----
// Part of the Encrypted Master Password plugin, provided by lat9@vinosdefrutastropicales.com
//
// @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
//
/*-----
** If the current page is the login page and it's a login request from the admin's Customers->Customers page,
** fix up the securityToken.
** Note:  Totally reworked for v1.6.0!
*/
if (isset($_GET['main_page']) && $_GET['main_page'] == FILENAME_LOGIN && strpos($_SERVER['HTTP_REFERER'], '/customers.php') !== false) {
  $emp_login = false;
  if (isset($_POST['email_address']) && isset($_POST['cID']) && isset($_POST['aID']) && isset($_POST['keyValue'])) {
    $check_emp_query = "SELECT customers_id FROM " . TABLE_CUSTOMERS . " WHERE customers_email_address = :emailAddress AND customers_id = :customersID";
    $check_emp_query = $db->bindVars($check_emp_query, ':emailAddress', zen_db_prepare_input($_POST['email_address']), 'string');
    $check_emp_query = $db->bindVars($check_emp_query, ':customersID', (int)$_POST['cID'], 'integer');
    $check_emp = $db->Execute($check_emp_query);
    if (!$check_emp->EOF) {
      $check_emp_query = 'SELECT admin_pass FROM ' . TABLE_ADMIN . ' WHERE admin_id = :adminID';
      $check_emp_query = $db->bindVars($check_emp_query, ':adminID', (int)$_POST['aID'], 'integer');
      $check_emp = $db->Execute($check_emp_query);
      if (!$check_emp->EOF) {
        if ($_POST['keyValue'] === md5($_POST['email_address'] . $_POST['cID'] . $_POST['aID'] . $check_emp->fields['admin_pass'])) {
          $_POST['securityToken'] = $_SESSION['securityToken'];
          $emp_login = true;
        }
      }
    }
  }
}