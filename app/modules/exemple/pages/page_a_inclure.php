<?php
//TODO - REFAIRE
//Définition du template
$tpl = new \Tpl\Template(__DIR__ . '/../templates/incluse.html');

//SOME STUFF

//Définition des variables
$tpl->setVar('message', 'Un autre message');

//FIN - ON défini le template en tant que variable
$tpl->render($template, 'block_inclus');