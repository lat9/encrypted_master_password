<?php
// -----
// Part of the Encrypted Master Password plugin, provided by lat9@vinosdefrutastropicales.com
//
// Copyright (C) 2016, Vinos de Frutas Tropicales
//
// @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
//   
if (!defined('IS_ADMIN_FLAG') || IS_ADMIN_FLAG !== true) {
  die('Illegal Access');
}

class emp_admin_customers_observer extends base 
{
    public function __construct()
    {
        $this->attach ($this, array ( 'NOTIFY_ADMIN_CUSTOMERS_MENU_BUTTONS' ) );
    }
  
    public function update(&$class, $eventID, $p1, &$p2, &$p3, &$p4)
    {
        global $db;
        switch ($eventID) {
            // -----
            // This notifier, issued by the Zen Cart v1.5.5 customers.php script, allows a plugin to add buttons
            // to the Customers->Customers display.
            //
            // $p1 ... A read-only copy of the current customer's $cInfo object
            // $p2 ... An updateable copy of the current right-sidebar contents.
            //
            case 'NOTIFY_ADMIN_CUSTOMERS_MENU_BUTTONS':
                if (empty ($p1) || !is_object ($p1) || empty ($p2) || !is_array ($p2)) {
                    trigger_error ('Missing or invalid parameters for the NOTIFY_ADMIN_CUSTOMERS_MENU_BUTTONS notifier.', E_USER_ERROR);
                    exit ();
                }

                $emp_sql = 'SELECT admin_profile, admin_pass from ' . TABLE_ADMIN . ' WHERE admin_id = :adminId: AND admin_profile IN (' . EMP_LOGIN_ADMIN_PROFILE_ID . ')';
                $emp_sql = $db->bindVars ($emp_sql, ':adminId:', $_SESSION['admin_id'], 'integer');
                $emp_result = $db->Execute ($emp_sql);

                if (!$emp_result->EOF && ( $_SESSION['admin_id'] == EMP_LOGIN_ADMIN_ID || in_array ($emp_result->fields['admin_profile'], explode (',', EMP_LOGIN_ADMIN_PROFILE_ID)) )) {
                    $p2[] = array ('align' => 'center', 'text' => '<div align="center"><form target="_blank" name="login" action="' . zen_catalog_href_link (FILENAME_LOGIN, '', 'SSL') . '" method="post">' . zen_draw_hidden_field('email_address', $p1->customers_email_address) . zen_image_submit ('button_placeorder.gif', EMP_BUTTON_PLACEORDER_ALT) . '</form></div>');
                }
                break;
                
            default:
                break;
        }
    }
}