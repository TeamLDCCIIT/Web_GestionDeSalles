<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/listereservation.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Liste des réservations');
$__template->setVar('page_title', 'Liste des réservations');

//Récupération des réservations d'un utilisateur
$db = new PgSqlLib();
$utilisateur = getUtilisateur();

$reservations = \lib\objets\Reservation::getUserReservations($db, $utilisateur->getId());

//Trier par date
//format : date => (reservations), ...
$reservations_tri = array();

foreach($reservations as $resa) {
    $date = new DateTime($resa->getDateDebut());
    $ddmmyyyy = $date->format('Y/m/d');
    if(!isset($reservations_tri[$ddmmyyyy]) || !is_array($reservations_tri[$ddmmyyyy])) {
        $reservations_tri[$ddmmyyyy] = array();
    }
    //ajout de la réservation
    array_push($reservations_tri[$ddmmyyyy], $resa);
}

$template->setVar('reservations', $reservations_tri);
//Faire en TWIG


//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');