<?php
/**
 * Created by Tristan LE GACQUE on 24/12/2017
 */

$template = new \Tpl\Template(__DIR__ . '/templates/403.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Accès restreint');
$__template->setVar('page_title', 'Erreur 403 : Accès restreint');


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');