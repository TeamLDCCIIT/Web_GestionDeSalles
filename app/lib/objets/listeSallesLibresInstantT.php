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
function listeLibreAt($db, $debut, $fin){
    //Requête, renvoie toutes les id_salles des salles libres entre $debut et $fin
    $req = "WITH TOUTE_LES_SALLES (id_salle) as (SELECT id_salle FROM Salles)
    SELECT DISTINCT id_salle from TOUTE_LES_SALLES INNER JOIN Reservation ON Reservation.id_salle = TOUTE_LES_SALLES.id_salle
    WHERE NOT (('" . $debut . "' < Reservation.debut AND Reservation.debut < '" . $fin . "' OR 
        '" . $debut . "' < Reservation.fin AND Reservation.fin <  '" . $fin . "') OR 
        (Reservation.debut < '" . $debut . "' AND '" . $fin . "' < Reservation.fin))";

    //fonction de Tristan
    //return \lib\objets\Salle::getSallesWithCustomWhere($db, "");

    //Envoi de la requête
    $result = $db->query($req);
    //Retour des id_salles
    return $result;
}