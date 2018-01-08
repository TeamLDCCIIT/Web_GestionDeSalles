<?php
/**
 * Created by Tristan LE GACQUE on 24/12/2017
 */

//Si on est pas directement a la racine, on redirige
$realURL = _root . '/' . basename($_SERVER['REQUEST_URI']);
if($_SERVER['REQUEST_URI'] != $realURL) {
    redirect($realURL);
}

$template = new \Tpl\Template(__DIR__ . '/templates/404.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Erreur 404');
$__template->setVar('page_title', 'Erreur 404 : Page introuvable');


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');