<?php
/**
 * Created by Tristan LE GACQUE on 31/12/2017
 */
/**
 * Ce fichier comprends des fonctions utiles
 */

/**
 * Renvoies le chemin relatif au $folder des fichiers presents dans le $folder, ordonnés par extension
 * @param string $folder Chemin absolu du dossier à parcourir
 * @param bool $recursive Recherche recursive
 * @return array renvoies la liste des fichiers ordonnés
 */
function getArrayOfFilesInsideByExt($folder, $recursive=true) {
    $files  = getFilesList($folder, $recursive); //Récupération de l'arborescence
    $result = array(); //Liste indexée par extension

    foreach($files as $key => $value) {
        $fileExt = strtolower(substr($value, strrpos($value, ".") + 1));
        if(!isset($result[$fileExt])) {
            $result[$fileExt] = array();
        }

        array_push($result[$fileExt], $value);
    }

    return $result;
}

/**
 * Renvoies la liste des fichiers compris dans le dossier $folder
 * @param string $folder Chemin absolu du dossier à parcourir
 * @param bool $recursive Recherche recursive
 * @return array renvoies la liste des fichiers
 */
function getFilesList($folder, $recursive=true, &$files=array()) {
    $scan = scandir($folder); //Renvoies la liste des fichiers et dossiers : id->(fichier/dossier)
    foreach ($scan as $key => $value)
    {
        if(!in_array($value, array(".","..")))
        {
            $fpath = ($folder . DIRECTORY_SEPARATOR . $value);

            if(is_dir($fpath) && $recursive) {
                //Si c'est un dossier, on fouille plus bas
                getFilesList($fpath, $recursive, $files);
            } else {
                //Sinon on verifie l'extension du fichier
                if(strpos($value, ".") !== FALSE) {

                    //Si le fichier possède une extension
                    $filePath   = substr($fpath, strlen($_SERVER['DOCUMENT_ROOT']));
                    array_push($files, $filePath);
                }
            }
        }
    }
    return $files;
}

/**
 * Récupère la liste des dossiers de module
 * @param boolean $onlyName Ne renvoyer que le nom au lieu du chemin du dossier
 * @return array liste des dossiers
 */
function getModuleFolders($onlyName = false) {
    $folders    = array();
    $scan       = scandir(__DIR__ . '/../app/modules/');
    foreach($scan as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            $fpath = __DIR__ . '/../app/modules/' . $value;

            if(is_dir($fpath)) {
                array_push($folders, $onlyName ? basename($fpath) : $fpath);
            }
        }
    }

    return $folders;
}

/**
 * Sécurise le tableau passé en paramètre de facon recursive
 * Protège contre les injections SQL
 * @param $item
 */
function secureArray(&$item) {
    if(is_array($item)) {
        array_walk($item, 'secureArray');
    } else {
        $item = htmlspecialchars($item);
    }
}

/**
 * Génère une chaine de caractères aléatoire alphanumérique
 * @param int $length Longeur
 * @return string Chaine générée aléatoirement
 */
function generateRandomString($length=10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $randomString;
}

/**
 * Redirige la page vers la nouvelle adresse
 * @param string $url nouvelle URL
 */
function redirect($url){
    header('Location: ' . $url, true);
    die();
}

/**
 * Vérifie si l'objet passé en paramètre est null
 * @param $obj mixed Objet à tester
 * @return bool True si null, false sinon
 */
function isnull($obj) {
    return (!isset($obj) || $obj === null || $obj === "" ||$obj === "undefined");
}

/**
 * Vérifie qu'on possède les droits dans le module
 * @param string $moduleFolder module
 * @return boolean
 */
function checkRights($moduleFolder) {
    $dfile = $moduleFolder . '/params/droits.json';
    if(file_exists($dfile)) {
        $groupRequired = json_decode(file_get_contents($dfile), true)['group'];
        if(!isnull($groupRequired) && $groupRequired !== '*') {
            //On vérifie que le groupe corresponde au groupe de l'utilisateur
            if(!isset($_SESSION['user']) || !in_array($groupRequired, $_SESSION['user']['group'])) {
                //Si il ne correspond pas, on cache le menu
                return false;
            }
        }
    }
    return true;
}


/**
 * POST data with Curl Lib
 * Version 1.0
 *
 * @param $url : l'url où il faut poster les données
 * @param $fields : un array avec les valeurs à transmettre en POST (pré-urlencode)
 * @return mixed : la réponse serveur en tant que string
 */
function postCurl ($url, $fields = array(), $verifySSL = true){

    // Create POST friendly string
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    $fields_string = rtrim($fields_string, '&');

    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verifySSL);
    // Execute post
    $result = curl_exec($ch);

    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch)); // Niquesam les erreurs Lydia
    }

    // Close connection
    curl_close($ch);

    // Return value
    return $result;
}


/**
 * Renvoies la date au format SQL
 * @param $frenchFormat
 * @return string
 */
function getDateTimeSqlFormat($frenchFormat) {
    if(strpos($frenchFormat, '/') !== FALSE) {
        //Date au format dd/mm/yy hh:ii:ss
        $date   = explode(" ", $frenchFormat)[0];
        $hour   = explode(" ", $frenchFormat)[1];

        $dsplit = explode("/", $date);

        $sqlFormat  = $dsplit[2] . '-' . $dsplit[1] . '-' .$dsplit[0] . ' ' . $hour;
        return $sqlFormat;
    } else {
        return $frenchFormat;
    }
}

/**
 * Récupère le nom utilisateur si il est connecté
 * @return \lib\objets\Utilisateur
 */
function getUtilisateur() {
    if(isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id_utilisateur'];
        return \lib\objets\Utilisateur::getUtilisateurByID(new PgSqlLib(), $id);
    } else {
        return null;
    }
}