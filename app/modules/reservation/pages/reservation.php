<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/reservation.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Réservation');
$__template->setVar('page_title', 'Réservation');


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');