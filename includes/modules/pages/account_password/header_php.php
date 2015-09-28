<?php
/**
 * Header code file for the Account Password page
 *
 * @package page
 * @copyright Copyright 2003-2014 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: Ian Wilson  Wed Feb 19 15:57:35 2014 +0000 Modified in v1.5.3 $
 */
// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_ACCOUNT_PASSWORD');

if (!$_SESSION['customer_id']) {
  $_SESSION['navigation']->set_snapshot();
  zen_redirect(zen_href_link(FILENAME_LOGIN, '', 'SSL'));
}

require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

if (isset($_POST['action']) && ($_POST['action'] == 'process')) {
  $password_current = zen_db_prepare_input($_POST['password_current']);
  $password_new = zen_db_prepare_input($_POST['password_new']);
  $password_confirmation = zen_db_prepare_input($_POST['password_confirmation']);

  $error = false;

  if (strlen($password_new) < ENTRY_PASSWORD_MIN_LENGTH) {
    $error = true;

    $messageStack->add('account_password', ENTRY_PASSWORD_NEW_ERROR);
  } elseif ($password_new != $password_confirmation) {
    $error = true;

    $messageStack->add('account_password', ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING);
  }

  if ($error == false) {
    $check_customer_query = "SELECT customers_password, customers_nick
                             FROM   " . TABLE_CUSTOMERS . "
                             WHERE  customers_id = :customersID";

    $check_customer_query = $db->bindVars($check_customer_query, ':customersID',$_SESSION['customer_id'], 'integer');
    $check_customer = $db->Execute($check_customer_query);
    
//-bof-encrypted_master_password-lat9  *** 1 of 2 ***
    // -----
    // Issue a notifier to allow an observer to verify the password if it's a logged-in EMP admin -- overriding the customer's existing password check.
    //
    $password_validated = false;
    $zco_notifier->notify ('NOTIFY_ACCOUNT_PASSWORD_VALIDATE_EXISTING', $password_current, $password_validated);

    if ($password_validated === true || zen_validate_password($password_current, $check_customer->fields['customers_password'])) {
//-eof-encrypted_master_password-lat9  *** 1 of 2 ***

      $nickname = $check_customer->fields['customers_nick'];
      
//-bof-encrypted_master_password-lat9  *** 2 of 2 ***
      // -----
      // If running on a version of Zen Cart (i.e. 1.5.3 or later) that includes the zcPassword class, use that class to determine and set the customer's new password.
      // Otherwise, use the standalone function.
      //
      if (class_exists ('zcPassword')) {
        zcPassword::getInstance(PHP_VERSION)->updateLoggedInCustomerPassword($password_new, $_SESSION['customer_id']);
        
      } else {
        $sql = "UPDATE " . TABLE_CUSTOMERS . " SET customers_password = :password WHERE customers_id = :customersID LIMIT 1";
        $sql = $db->bindVars ($sql, ':customersID', $_SESSION['customer_id'], 'integer');
        $sql = $db->bindVars ($sql, ':password', zen_encrypt_password ($password_new), 'string');
        $db->Execute($sql);
        
      }
//-eof-encrypted_master_password-lat9  *** 2 of 2 ***

      $sql = "UPDATE " . TABLE_CUSTOMERS_INFO . "
              SET    customers_info_date_account_last_modified = now()
              WHERE  customers_info_id = :customersID";

      $sql = $db->bindVars($sql, ':customersID',$_SESSION['customer_id'], 'integer');
      $db->Execute($sql);

        if ($phpBB->phpBB['installed'] == true) {
          if (zen_not_null($nickname) && $nickname != '') {
            $phpBB->phpbb_change_password($nickname, $password_new);
          }
        }

      $messageStack->add_session('account', SUCCESS_PASSWORD_UPDATED, 'success');

      zen_redirect(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'));
    } else {
      $error = true;

      $messageStack->add('account_password', ERROR_CURRENT_PASSWORD_NOT_MATCHING);
    }
  }
}

$breadcrumb->add(NAVBAR_TITLE_1, zen_href_link(FILENAME_ACCOUNT, '', 'SSL'));
$breadcrumb->add(NAVBAR_TITLE_2);

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_ACCOUNT_PASSWORD');
