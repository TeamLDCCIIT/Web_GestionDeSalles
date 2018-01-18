<?php
/**
 * Created by Jérémie on 16/01/2018
 */

/**
 * Retourne si une salle est disponible ou non
 * @param $db PgSqlLib
 * @param $id_salle int
 * @param $debut string
 * @param $fin string
 * @return string $type_res
 * @throws ErrorException
 */
function isDispo($db, $id_salle, $debut, $fin)
{
    $req = "SELECT DISTINCT r.id_salle FROM reservation as r
                WHERE (
                      (r.id_salle = $id_salle) AND (
                      (r.debut <= '$debut' AND r.fin >= '$fin' ) OR
                      (r.debut > '$debut' AND r.debut < '$fin' ) OR
                      (r.fin > '$debut' AND r.fin < '$fin' )
                  )
          )";

    //Requête, la salle est libre si aucun résultat n'est retourné
   /* $req = "SELECT id_res FROM reservation as r , salles as s
    WHERE s.id_salle = " . $id_salle . " AND 
    r.id_salle = s.id_salle AND
    (('" . $debut . "' < reservation.debut AND reservation.debut < '" . $fin . "' OR 
    '" . $debut . "' < reservation.fin AND reservation.fin <  '" . $fin . "') OR 
    (reservation.debut < '" . $debut . "' AND '" . $fin . "' < reservation.fin))";
   */

    //Envoi de la requête
    $result = $db->query($req);

    //Tester si la salle est libre
    return ($result->num_rows() === 0);
}