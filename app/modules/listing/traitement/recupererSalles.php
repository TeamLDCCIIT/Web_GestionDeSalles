<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */
//Script de récupération des salles en fonction des filtres

//TODO : filtres
$filtre_campus = 1;
$filtre_etage = 1;
$filtre_type = false;

//Initialisation de la db et des variables
$db = new MySqlLib();
$db->purify($filtre_campus);
$db->purify($filtre_etage);
$db->purify($filtre_type);

//Clause WHERE
$query = "id_campus= " . intval($filtre_campus);
$query .= ($filtre_etage) ? (" AND etage= " . intval($filtre_etage)) : "";
$query .= ($filtre_type) ? (" AND type_salle= '" . strval($filtre_type)) . "'" : "";

//Récupération de la liste de salles
$salles = \lib\objets\Salle::getSallesWithCustomWhere(new MySqlLib(), $query);

//Préparation de la réponse
$salleArray = array();
foreach($salles as $salle) {
    array_push($salleArray, array(
        "nom"   =>  $salle->getNom(),
        "code"  =>  $salle->getCode(),
        "etage" =>  $salle->getEtage(),
        "type"  =>  $salle->getType()
    ));
}


$response = array(
    'type'      => 'success',
    'salles'    =>  $salleArray
);

//Renvoyer la réponse au format JSON
die(json_encode($response));