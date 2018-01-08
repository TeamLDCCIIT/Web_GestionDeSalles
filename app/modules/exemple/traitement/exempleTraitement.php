<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */

$message = "Vous êtes bien sur la page exempleTraitement";

$response = array(
    'message'       => $message,
    'module'        => $__module,
    'page'          => $__page,
    'id'            => $__id,
    'LoginEnabled'  => _enable_login,
    'DebugEnabled'  => _debug
);

//Renvoyer la réponse au format JSON
die(json_encode($response));