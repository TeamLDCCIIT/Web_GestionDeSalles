<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/pageTraitement.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Page de traitement');
$__template->setVar('page_title', 'Page de traitement');

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');