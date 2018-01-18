<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/listereservation.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Mes réservations');
$__template->setVar('page_title', 'Liste de mes réservations');

//Récupération des réservations d'un utilisateur
$db = new PgSqlLib();
$utilisateur = getUtilisateur();

$reservations = \lib\objets\Reservation::getUserReservations($db, $utilisateur->getId());

//Trier par date
//format : date => (reservations), ...
$reservations_tri = array();
$reservations_out = array();

$today = new DateTime();
foreach($reservations as $resa) {
    $date = new DateTime($resa->getDateDebut());
    $ddmmyyyy = $date->format('d M Y');

    //ajout de la réservation
    if($date >= $today) {
        if(!isset($reservations_tri[$ddmmyyyy]) || !is_array($reservations_tri[$ddmmyyyy])) {
            $reservations_tri[$ddmmyyyy] = array();
        }
        array_push($reservations_tri[$ddmmyyyy], $resa);
    } else {
        if(!isset($reservations_out[$ddmmyyyy]) || !is_array($reservations_out[$ddmmyyyy])) {
            $reservations_out[$ddmmyyyy] = array();
        }
    }

}

$template->setVar('reservations', $reservations_tri);

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');