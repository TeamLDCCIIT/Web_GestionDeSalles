<?php
/**
 * Created by Jérémie on 17/01/2018
 */

/**
 * Récupère la liste des salles disponibles au moment donné pour le campus donné
 * @param $db PgSqlLib
 * @param $debut string
 * @param $fin string
 * @param $campus int
 * @return array
 */
function getSallesDispoAt($db, $debut, $fin, $campus){
    //Protection
    $db->purify($debut);
    $db->purify($fin);
    $campus = intval($campus);

    //Salles non dispo
    $nodisp = "SELECT DISTINCT s.id_salle FROM salles as s 
                JOIN reservation as r ON r.id_salle = s.id_salle
                WHERE (
                  (r.debut <= '$debut' AND r.fin >= '$fin' ) OR
                  (r.debut > '$debut' AND r.debut < '$fin' ) OR
                  (r.fin > '$debut' AND r.fin < '$fin' )
                )";

    $libres = "SELECT DISTINCT s.id_salle, s.nom, s.code, s.etage, s.type_salle 
                FROM salles as s 
                WHERE s.id_campus = $campus 
                AND s.id_salle NOT IN ($nodisp) 
                ORDER BY s.nom";


    $result = $db->query($libres);
    $salles = array();

    while($row = $result->fetch_assoc()) {
        array_push($salles, array(
            'id'        => intval($row['id_salle']),
            'nom'       => $row['nom'],
            'code'      => $row['code'],
            'etage'     => $row['etage'],
            'type'      => TypeSalle::getName(TypeSalle::findTypeSalle($row['type_salle'])),
            'icon'      => TypeSalle::getIcon(TypeSalle::findTypeSalle($row['type_salle']))
        ));
    }

    return $salles;
}