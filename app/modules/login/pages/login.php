<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/login.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Login');

//Redirection si il est déjà connecté
if(!isnull(getUtilisateur())) {
    redirect(_accueil_module.'-'._accueil_page);
}

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');