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
//Requête, la salle est libre si aucun résultat n'est retourné
$req = "SELECT id_res FROM reservation,salles,utilisateur,campus 
WHERE salles.id_salle = '".$id_salle."' AND campus.id_campus = '".$id_campus."' AND 
(('".$debut."' < reservation.debut < '".$fin."' OR '".$debut."' < reservation.fin < '".$fin."') OR 
(reservation.debut < '".$debut."' AND '".$fin."' < reservation.fin))";
//Envoi de la requête
$result = $db->query($req);
//Tester si la salle est libre
if($result->num_rows() == 0){
    $type_res = 'success';
    $msg = 'La salle est libre';
} else {
    $resultat = $result->fetch_assoc();
    $type_res = 'error';
    $msg = 'La salle est déjà réservée';
}
//Mise en forme de la sortie
$response = array(
    "type" => $type_res,
    "message" => $msg
);
//Envoi du message de sortie
die(json_encode($response));