<?php
/**
 * Created by Tristan LE GACQUE on 24/12/2017
 */
//Paramètres SQL
define('_sql_host', '127.0.0.1');
define('_sql_login', 'postgres');
define('_sql_password', 'postgre');
define('_sql_db', 'gds');

//Paramètres globaux
define("_debug", true);
define("_accueil_module", 'listing');
define("_accueil_page", 'listeDesSalles');
define("_app_name", '<b>Gestion</b> de salles');
define("_app_smallname", '<b>G</b>DS');
define("_root", '/Web_GestionDeSalles');

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
