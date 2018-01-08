<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/page.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Premiere page');
$__template->setVar('page_title', 'Titre de page');
$__template->setVar('page_subtitle', 'sous-titre');

//SOME STUFF


//Définition des variables
$template->setVar('message', 'Coucou toi');
$template->setVar('nom', 'Le Gacque');
$template->setVar('prenom', 'Tristan');
$template->setVar('variables', $template->variables);


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');