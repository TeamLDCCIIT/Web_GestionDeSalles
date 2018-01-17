<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */
//Script d'enregistrement de reservation pour un utilsateur
$db = new PgSqlLib();
$response = array('type'=>'error', 'message'=>'Une erreur s\'est produite');

//Récupérer les paramètres et mettre au bon format YY-MM-DD HH:II:SS
$id_salle   = isset($_POST['salle']) ? intval($_POST['salle']) : null;
$date       = isset($_POST['date']) ? strval($_POST['date']) : null;
$debut      = isset($_POST['debut']) ? strval($_POST['debut']) : null;
$fin        = isset($_POST['fin']) ? strval($_POST['fin']) : null;
$motif      = isset($_POST['motif']) ? strval($_POST['motif']) : null;

//Mise au bon format des variables
$dateDebut  = $date . " " . $debut;
$dateFin    = $date . " " . $fin;

//TODO : Verifier les dates > < et les keys de database

//Vérification des paramètres
if(!isnull($id_salle) && $id_salle > 0 && !isnull($dateDebut) && !isnull($dateFin) && !isnull($fin) && !isnull($debut)) {
    //Mise au bon format
    $dateDebut      = getDateTimeSqlFormat($dateDebut);
    $dateFin        = getDateTimeSqlFormat($dateFin);
    $salle          = \lib\objets\Salle::getSalleByID($db, $id_salle);

    //Récupérer l'utilisateur ID (Vérifier si il est connecté)
    $utilisateur    = getUtilisateur();
    //TODO
    $utilisateur = new \lib\objets\Utilisateur(1, 'LG', 'Tristan', 'tlegacque', 'user', \lib\objets\Campus::getCampusByID($db, 1));
    if(!isnull($utilisateur)) {
        //Vérifier la disponibilité de la salle pour la date donnée
        //TODO - Methode de jeremie
        $salleDispo = true;

        //Initialisation de la réservation
        $reservation    = new \lib\objets\Reservation(-1, $dateDebut, $dateFin, $utilisateur, $salle);

        if($salleDispo) {
            //Enregistrer la réservation
            $result = \lib\objets\Reservation::saveReservation($db, $reservation);

            if($result) {
                $response['type']       = "success";
                $response['message']    = "La réservation a bien été effectuée";
            } else {
                //Erreur d'enregistrement
                $response['message'] = "Impossible d'effectuer la requête d'enregistrement pour la salle " . $salle->getNom();
            }
        } else {
            //Salle non disponible
            $response['message'] = "La salle " . $salle->getNom() . " (" . $salle->getCode() . ") n'est pas disponible ";
            $response['message'] .= "entre " . $reservation->getDateDebut() . " et " . $reservation->getDateFin();
        }
    } else {
        //Utilisateur non connecté
        $response['message'] = "Vous devez être connecté pour effectuer cette action !";
    }
} else {
    $response['message'] = "Un ou plusieurs paramètres sont manquants";
}

//Renvoyer la réponse au format JSON
die(json_encode($response));