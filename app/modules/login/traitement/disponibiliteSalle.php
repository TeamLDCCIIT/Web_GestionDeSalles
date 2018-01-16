<?php
/**
 * Created by Jérémie on 16/01/2018
 */

//Récupérer les paramètres de la requête
$id_salle = isset($_POST['InputIdSalle']) ? strval($_POST['InputIdSalle']) : null;;
$id_campus = isset($_POST['InputIdCampus']) ? strval($_POST['InputIdCampus']) : null;;
$debut = isset($_POST['InputDebut']) ? strval($_POST['InputDebut']) : null;;
$fin = isset($_POST['InputFin']) ? strval($_POST['InputFin']) : null;;
//Connexion à la DB
$db = new PgSqlLib();
//Requête
$req = 'SELECT id_res FROM reservation,salles,utilisateur,campus 
WHERE id_salle = '".$id_salle."' AND id_campus = '".$id_campus."' AND (
(debut < '".$debut."' AND '".$debut."' < fin < '".$fin."') OR
('".$debut."' < debut < '".$fin."' AND '".$debut."' < fin < '".$fin."') OR
('".$debut."' < debut < '".$fin."' AND '".$fin."' < fin) OR
(debut ))';
//Mise en forme de la sortie
$response = array(
    "type" => $type_res,
    "message" => $msg
);
//Envoi du message de sortie
die(json_encode($response));