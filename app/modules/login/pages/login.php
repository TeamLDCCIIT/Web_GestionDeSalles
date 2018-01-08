<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/login.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Login');

//TODO - Ceci est une page d'exemple, qui doit être réecrite

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');