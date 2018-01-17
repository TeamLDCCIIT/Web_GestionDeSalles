<?php
/**
 * Created by Jérémie on 17/01/2018
 */

/**
 * @param $db
 * @param $debut
 * @param $fin
 * @return mixed
 */
function listeLibreAt2($db, $debut, $fin){
    /*
     * Requête
     * @return liste de id_salles libres entre $debut et $fin
     * lien entre id_salle de reservation et un id_salle de salles
     * Reservation.id_salle IN (SELECT id_salle FROM Salles)
     * --> une salle qui a une réservation ne doit pas être prise dans le créneau horaire indiqué
     */
    $req = "SELECT Salles.id_salle FROM Salles, Reservation 
    WHERE NOT (Reservation.id_salle IN (SELECT id_salle FROM Salles) AND 
    (('" . $debut . "' < Reservation.debut AND Reservation.debut < '" . $fin . "' OR 
    '" . $debut . "' < Reservation.fin AND Reservation.fin <  '" . $fin . "') OR 
    (Reservation.debut < '" . $debut . "' AND '" . $fin . "' < Reservation.fin)))";
    //Envoi de la requête
    $result = $db->query($req);
    //Retour du résultat
    return $result;
}