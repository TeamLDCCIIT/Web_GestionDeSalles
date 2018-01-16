<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */
//Script d'enregistrement de reservation pour un utilsateur

//Récupérer les paramètres et mettre au bon format YY-MM-DD HH:II:SS
$id_salle   = isset($_POST['id_salle']) ? intval($_POST['id_salle']) : null;
$dateDebut  = isset($_POST['date_debut']) ? strval($_POST['date_debut']) : null;
$dateFin    = isset($_POST['date_fin']) ? strval($_POST['date_fin']) : null;

//Mise au bon format
$dateDebut  = getDateTimeSqlFormat($dateDebut);
$dateFin    = getDateTimeSqlFormat($dateFin);

//Récupérer l'utilisateur ID (Vérifier si il est connecté)

//Vérifier la disponibilité de la salle pour la date donnée

//Enregistrer si possible

//Renvoyer reponse json

//Ajouter Toasterjs

//Récupér
$tri_col        = isset($_POST['triCol']) ? strval($_POST['triCol']) : null;
$tri_ord        = isset($_POST['triOrd']) ? strval($_POST['triOrd']) : null;

//Initialisation de la db et des variables
$db = new PgSqlLib();
$db->purify($filtre_campus);
$db->purify($filtre_etage);
$db->purify($filtre_type);

//Clause WHERE
$query = "id_campus=" . intval($filtre_campus);
$query .= ($filtre_etage >= 0) ? (" AND etage= " . intval($filtre_etage)) : "";
$query .= ($filtre_type >= 0) ? (" AND LOWER(type_salle)=LOWER('" . TypeSalle::getName($filtre_type) ."'") . ")" : "";

$query .= (!isnull($tri_col) && !isnull($tri_ord)) ? " ORDER BY " . strval($tri_col) . " " . strval($tri_ord) : "";

//Récupération de la liste de salles
$salles = \lib\objets\Salle::getSallesWithCustomWhere($db, $query);

//Préparation de la réponse
$salleArray = array();
foreach($salles as $salle) {
    array_push($salleArray, array(
        "nom"   =>  $salle->getNom(),
        "code"  =>  $salle->getCode(),
        "etage" =>  $salle->getEtage(),
        "type"  =>  TypeSalle::getName($salle->getType())
    ));
}


$response = array(
    'type'      => 'success',
    'salles'    =>  $salleArray
);

//Renvoyer la réponse au format JSON
die(json_encode($response));