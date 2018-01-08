<?php
//TODO - Essayer l'inclusion de page
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/page.html');

//SOME STUFF

//Définition des variables
$template->setVar('message', 'Coucou toi');
$template->setVar('nom', 'Le Gacque');
$template->setVar('prenom', 'Tristan');
$template->setVar('variables', $template->variables);

//Inclure un block
include('page_a_inclure.php');

//FIN - Render du template
$template->render($__template, 'content');