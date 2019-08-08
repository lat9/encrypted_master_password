<?php
// -----
// Part of the Encrypted Master Password plugin, provided by lat9
//
// Copyright (C) 2013-2019 Vinos de Frutas Tropicales
//
// @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
//

// -----
// When entered via the "Place Order" button from the admin, the customer's email address is posted and it needs to be
// recorded as a global variable to be pre-populated in the login-page's email-address field.
//
if (!empty($_GET['main_page']) && $_GET['main_page'] == FILENAME_LOGIN && isset($_POST['email_address'])) {
    $email_address = zen_db_prepare_input(trim($_POST['email_address']));
}

// -----
// If an EMP admin is currently logged into the customer's account, let that admin know who s/he is shopping for.
//
if (isset($_SESSION['emp_admin_id'])) {
    $shopping_for_name = $_SESSION['customer_first_name'] . ' ' . $_SESSION['customer_last_name'];
    if (!defined('EMP_SHOPPING_FOR_MESSAGE_SEVERITY')) {
        define('EMP_SHOPPING_FOR_MESSAGE_SEVERITY', 'success');
    }
    $severity = EMP_SHOPPING_FOR_MESSAGE_SEVERITY;
    if (!in_array($severity, array('success', 'caution', 'warning', 'error'))) {
        $severity = 'success';
    }
    $messageStack->add('header', sprintf(EMP_SHOPPING_FOR_MESSAGE, $shopping_for_name, $_SESSION['emp_customer_email_address']), $severity);
}
