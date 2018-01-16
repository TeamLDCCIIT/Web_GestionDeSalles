<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/listereservation.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Liste des réservations');
$__template->setVar('page_title', 'Liste des réservations');


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');