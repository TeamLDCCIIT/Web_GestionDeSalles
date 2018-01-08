<?php
/** PAGE PRINCIPALE
 * Cette page est appelée a chaque fois, et inclus le contenu de la page souhaitée
 * La page souhaitée doit être passée en paramètre : page=...
 */

//Démarrage des sessions
session_start();

/**
 * ETAPE DE DEFINITION DES LIBRAIRIES & VARIABLES
 */

//Définition des librairies
require_once __DIR__ . '/vendor/autoload.php'; //Autoload des librairies composer
require_once __DIR__ . '/lib/Template/Template.php'; //Load de l'objet Template
require_once __DIR__ . '/lib/Template/MySqlLib.php'; //Load de l'objet Template
require_once __DIR__ . '/lib/functions.php'; //Load des fonctions du framework
require_once __DIR__ . '/params/params.php'; //Load des paramètres

//Sécurisation des paramètres GET
secureArray($_GET);

//Récupération des paramètres GET
$__page     = isset($_GET['page']) ? strval($_GET['page']) : _accueil_page;
$__module   = isset($_GET['module']) ? strval($_GET['module']) : _accueil_module;
$__id       = isset($_GET['id']) ? strval($_GET['id']) : null;
$traitement = isset($_GET['traitement']) ? boolval($_GET['traitement']) : null;


/**
 * ETAPE DE DEFINITION DU TEMPLATE ET DES MODULES
 */

//Définition du template général
$__template = new \Tpl\Template('templates/' . ($traitement ? 'traitement.html' : 'index.html'));

//Définition des menus
if(!$traitement) {
    require_once __DIR__ . '/menus.php';
}

//Chargement des ressources de l'application (type => lien) pour JS & CSS
$folderToAutoload = array('css' => 'css', 'js' => 'js');
//Ajout des ressources spécifiques du module
if(is_dir(__DIR__.'/app/modules/' . basename($__module) . '/js')) {
    $folderToAutoload['modules/' .  basename($__module) . '/js'] = 'js';
}
foreach($folderToAutoload as $folder => $ext) {
    //Récupération de la liste des fichiers dans le dossier
    $filesToLoad = getArrayOfFilesInsideByExt(__DIR__.'/app/' . $folder);
    $__template->setVar('ressources_'.$ext, isset($filesToLoad[$ext]) ? $filesToLoad[$ext] : null);
}

//Chargement des librairies annexes
$filesToLoad = getArrayOfFilesInsideByExt(__DIR__.'/app/lib');
$filesToLoad = isset($filesToLoad['php']) ? $filesToLoad['php'] : null;
if(!is_null($filesToLoad)) {
    foreach($filesToLoad as $file) {
        require __DIR__ . '/app/lib/' . basename($file);
    }
}







/**
 * ETAPE DE ROUTAGE
 */
//Inclusion de la page souhaitée
$__page_path    = __DIR__ . '/app/modules/' . basename($__module) . ($traitement ? '/traitement/' : '/pages/') . basename($__page) . '.php';
$__404_path     = __DIR__ . '/404.php';
$__403_path     = __DIR__ . '/403.php';
$page_to_load   = file_exists($__page_path) ? $__page_path : $__404_path;

//Si on ne possède pas les droits
if(!checkRights(substr($page_to_load, 0, strpos($page_to_load, '/pages/')))) {
    //Si l'utilisateur n'est pas login, on le redirige
    if(!isset($_SESSION['user']) && _enable_login) {
        redirect(_login_module . '-' . _login_page_login);
    } else {
        //Sinon on retourne une erreur
        $page_to_load = $__403_path;
    }
}
//On inclus la page a la fin
include $page_to_load;




/**
 * ETAPE DE RENDER DU TEMPLATE
 */

//Définition des variables globales
$__template->setVar('root', _root);
$__template->setVar('username', isset($_SESSION['user']) ? $_SESSION['user']['username'] : '');
$__template->setVar('app_smallname', _app_smallname);
$__template->setVar('app_name', _app_name);
$__template->setVar('enablelogin', _enable_login);
$__template->setVar('loginpath', _login_module . '-' . _login_page_login);
$__template->setVar('logoutpath', _login_module . '-' . _login_page_logout);

//FIN - Render du template général
echo $__template->getRenderContent();