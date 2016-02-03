<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: orders.php 6214 2007-04-17 02:24:25Z ajeh $
 */
define('OSH_EMAIL_SEPARATOR', '------------------------------------------------------');
define('OSH_EMAIL_TEXT_SUBJECT', 'Order Update');
define('OSH_EMAIL_TEXT_ORDER_NUMBER', 'Order Nummer:');
define('OSH_EMAIL_TEXT_INVOICE_URL', 'Gedetailleerde factuur:');
define('OSH_EMAIL_TEXT_DATE_ORDERED', 'Datum besteld:');
define('OSH_EMAIL_TEXT_COMMENTS_UPDATE', '<em>De opmerkingen voor uw bestelling is: </em>' . "\n\n");
define('OSH_EMAIL_TEXT_STATUS_UPDATED', 'Uw bestelling\'s status is bijgewerkt:' . "\n");  /*v1.0.0c*/
define('OSH_EMAIL_TEXT_STATUS_NO_CHANGE', 'Uw bestelling\'s status is niet veranderd:' . "\n");  /*v1.0.0a*/
define('OSH_EMAIL_TEXT_STATUS_LABEL', '<strong>Huidige status: </strong> %s' . "\n\n");  /*v1.0.0c*/
define('OSH_EMAIL_TEXT_STATUS_CHANGE', '<strong>Oude status:</strong> %1$s, <strong>Nieuwe status:</strong> %2$s' . "\n\n");  /*v1.0.0c*/
define('OSH_EMAIL_TEXT_STATUS_PLEASE_REPLY', 'Beantwoord deze e-mail als u vragen hebt.' . "\n");

// -----
// Used by orders.php, so that the orders.php language file doesn't require change!
//
define('TABLE_HEADING_UPDATED_BY', 'Bijgewerkt door');  /*v1.0.2a*/