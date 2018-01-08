<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/accueil.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Accueil');
$__template->setVar('page_title', 'Page d\'accueil');

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');