<?php
/**
 * Created by Tristan LE GACQUE on 24/12/2017
 */
//Paramètres SQL
define('_sql_host', '127.0.0.1');
define('_sql_login', 'dev');
define('_sql_password', 'dev');
define('_sql_db', 'salles');

//Paramètres globaux
define("_debug", true);
define("_accueil_module", 'exemple');
define("_accueil_page", 'accueil');
define("_app_name", '<b>Appli</b>GDS');
define("_app_smallname", '<b>G</b>DS');
define("_root", '');

//Menu de login
define('_enable_login', true);
define("_login_module", 'login');
define("_login_page_login", 'login');
define("_login_page_logout", 'logout');

//Gestion du debugage
if(_debug) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}
