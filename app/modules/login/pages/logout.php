<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/logout.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Logout');

//TODO - Ceci est une page d'exemple, qui doit être réecrite

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');