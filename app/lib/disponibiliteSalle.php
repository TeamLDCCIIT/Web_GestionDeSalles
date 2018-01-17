<?php
/**
 * Created by Jérémie on 16/01/2018
 */

/**
 *
 * @param $db PgSqlLib
 * @param $id_salle int
 * @param $debut string
 * @param $fin string
 * @return string $type_res
 * @throws ErrorException
 */
function isDispo($db, $id_salle, $debut, $fin)
{
//Requête, la salle est libre si aucun résultat n'est retourné
    $req = "SELECT id_res FROM reservation,salles,utilisateur 
    WHERE salles.id_salle = '" . $id_salle . "' AND
    (('" . $debut . "' < reservation.debut AND reservation.debut < '" . $fin . "' OR 
    '" . $debut . "' < reservation.fin AND reservation.fin <  '" . $fin . "') OR 
    (reservation.debut < '" . $debut . "' AND '" . $fin . "' < reservation.fin))";
//Envoi de la requête
    $result = $db->query($req);
//Tester si la salle est libre
    if ($result->num_rows() == 0) {
        $type_res = true;
    } else {
        $type_res = false;
    }
//Retour du résultat
    return $type_res;
}