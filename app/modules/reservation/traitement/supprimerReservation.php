<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */
//Script d'enregistrement de reservation pour un utilsateur
$db = new PgSqlLib();
$response = array('type'=>'error', 'message'=>'Une erreur s\'est produite');

//Récupérer les paramètres et mettre au bon format YY-MM-DD HH:II:SS
$id_resa  = isset($_POST['reservation']) ? intval($_POST['reservation']) : null;

//Vérification des paramètres
if(!isnull($id_resa)) {

    //Récupérer l'utilisateur ID (Vérifier si il est connecté)
    $utilisateur    = getUtilisateur();
    if(!isnull($utilisateur)) {

        //Vérification des droits de l'utilisateur
        $req = "SELECT id_res FROM reservation 
                WHERE id_res=$id_resa AND id_utilisateur=".$utilisateur->getId();

        $result = $db->query($req);
        //Si c'est sa réservation
        if($result->num_rows() === 1) {
            $req = "DELETE FROM reservation WHERE id_res=$id_resa";
            $result = $db->execute($req);

            if($result) {
                //Done
                $response['type']       = "success";
                $response['message']    = "La réservation a bien été effectuée";
            } else {
                $response['message']    = "Impossible de supprimer la réservation";
            }
        } else {
            $response['message'] = "Impossible de supprimer la réservation ".$utilisateur->getId() . " " . $id_resa;
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