<?php
/**
 * @package admin languageDefines Dutch Zen Cart Version 1.5.5
 * @ Maintained by Zen4All (http://zen4all.nl)
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sun Oct 18 23:54:03 2015 -0400 Modified in v1.5.5 $
 */

define('HEADING_TITLE', 'Klanten');

define('TABLE_HEADING_ID', 'Klant ID');
define('TABLE_HEADING_FIRSTNAME', 'Voornaam');
define('TABLE_HEADING_LASTNAME', 'Achternaam');
define('TABLE_HEADING_ACCOUNT_CREATED', 'Account toegevoegd');
define('TABLE_HEADING_LOGIN', 'Laatste inlogdatum');
define('TABLE_HEADING_ACTION', 'Actie');
define('TABLE_HEADING_PRICING_GROUP', 'Prijsgroep');
define('TABLE_HEADING_AUTHORIZATION_APPROVAL', 'Status klant');
define('TABLE_HEADING_GV_AMOUNT', 'Waardebon saldo');

define('TEXT_DATE_ACCOUNT_CREATED', 'Account toegevoegd:');
define('TEXT_DATE_ACCOUNT_LAST_MODIFIED', 'Datum laatste wijziging:');
define('TEXT_INFO_DATE_LAST_LOGON', 'Laatste keer aangemeld:');
define('TEXT_INFO_NUMBER_OF_LOGONS', 'Aantal keer aangemeld:');
define('TEXT_INFO_COUNTRY', 'Land:');
define('TEXT_INFO_NUMBER_OF_REVIEWS', 'Aantal recensie(s):');
define('TEXT_DELETE_INTRO', 'Weet je zeker dat je deze klant wilt verwijderen?');
define('TEXT_DELETE_REVIEWS', 'Verwijder %s recensie(s)');
define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'Verwijder klant');
define('TYPE_BELOW', 'Type hieronder');
define('PLEASE_SELECT', 'Selecteer één');
define('TEXT_INFO_NUMBER_OF_ORDERS', 'Aantal bestellingen:');
define('TEXT_INFO_LAST_ORDER','Laatste bestelling:');
define('TEXT_INFO_ORDERS_TOTAL', 'Totaal:');
define('CUSTOMERS_REFERRAL', 'Klantreferentie<br />1e Kortingsbon');
define('TEXT_INFO_GV_AMOUNT', 'Waardebon saldo');

define('ENTRY_NONE', 'Geen');

define('TABLE_HEADING_COMPANY','Bedrijf');

define('TEXT_INFO_HEADING_RESET_CUSTOMER_PASSWORD', 'Reset klant wachtwoord');
define('TEXT_PWDRESET_INTRO', 'Om het wachtwoord voor deze klant te resetten, type een nieuw wachtwoord en bevestig het, hieronder. Het nieuwe wachtwoord moet voldeoen aan de normale wachtwoord regels die zijn opgelegd aan de klanten.');
define('TEXT_CUST_NEW_PASSWORD', 'Nieuw wachtwoord:');
define('TEXT_CUST_CONFIRM_PASSWORD', 'Bevestig wachtwoord:');
define('ERROR_PWD_TOO_SHORT', 'Fout: wachtwoord is korter dan het aantal karakters benodigt voor deze winkel.');
define('SUCCESS_PASSWORD_UPDATED', 'Wachtwoord aangepast.');

define('EMAIL_CUSTOMER_PWD_CHANGE_MESSAGE', 'Uw wachtwoord is aangepast door de administrator van de webwinkel. Uw nieuwe wachtwoord is: ');
define('EMAIL_CUSTOMER_PWD_CHANGE_SUBJECT', 'Account wachtwoord reset');
define('EMAIL_CUSTOMER_PWD_CHANGE_MESSAGE_FOR_ADMIN', 'Je hebt het wachtwoord voor een klant aangepast: ' . "\n" . '%s' . "\n\n" . 'Administrator ID: %s');

define('CUSTOMERS_AUTHORIZATION', 'Status toegang klant ');
define('CUSTOMERS_AUTHORIZATION_0', 'Akkoord');
define('CUSTOMERS_AUTHORIZATION_1', 'Lopende goedkeuring - moet goedgekeurd zijn om te surfen');
define('CUSTOMERS_AUTHORIZATION_2', 'Lopende goedkeuring - mag surfen maar geen prijzen zien');
define('CUSTOMERS_AUTHORIZATION_3', 'Lopende goedkeuring - mag surfen, prijzen zien maar niet afrekenen');
define('CUSTOMERS_AUTHORIZATION_4', 'Banned - Niet toegestaan om in te loggen of te winkelen');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION1', 'Waarschuwing: de klant moet eerst goedgekeurd zijn voordat deze mag surfen in je winkel. De klant heeft de status: lopende goedkeuring, mag niet surfen.');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION2', 'Waarschuwing: de klant moet eerst goedgekeurd zijn voordat deze de prijzen mag zien. De klant heeft de status: lopende goedkeuring, wel surfen geen prijzen zichtbaar.');

define('EMAIL_CUSTOMER_STATUS_CHANGE_MESSAGE', 'Uw klantstatus is aangepast.');
define('EMAIL_CUSTOMER_STATUS_CHANGE_SUBJECT', 'Klantstatus aangepast');

define('ADDRESS_BOOK_TITLE', 'Adresboekvermeldingen');
define('PRIMARY_ADDRESS', '(primair adres)');
define('TEXT_MAXIMUM_ENTRIES', '<span class="coming"><strong>NOOT:</strong></span> Een maximum van %s adres boek ingevingen zijn toegestaan.');
define('TEXT_INFO_ADDRESS_BOOK_COUNT', ' | 1 van  ');
