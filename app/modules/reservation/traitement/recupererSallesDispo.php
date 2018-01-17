<?php
/**
 * Created by Tristan LE GACQUE on 08/01/2018
 */
//Script de récupération des salles disponibles
$db = new PgSqlLib();
$response = array('type'=>'error', 'message'=>'Une erreur s\'est produite');

//Récupérer les paramètres et mettre au bon format YY-MM-DD HH:II:SS
$id_campus  = isset($_POST['campus']) ? intval($_POST['campus']) : null;
$date       = isset($_POST['date']) ? strval($_POST['date']) : null;
$debut      = isset($_POST['debut']) ? strval($_POST['debut']) : null;
$fin        = isset($_POST['fin']) ? strval($_POST['fin']) : null;

//Mise au bon format des variables
$dateDebut  = $date . " " . $debut;
$dateFin    = $date . " " . $fin;

//Vérification des paramètres
if(!isnull($id_campus) && !isnull($dateDebut) && !isnull($dateFin) && !isnull($fin) && !isnull($debut)) {
    //Mise au bon format
    $dateDebut      = getDateTimeSqlFormat($dateDebut);
    $dateFin        = getDateTimeSqlFormat($dateFin);

    if(new DateTime($dateDebut) < new DateTime($dateFin)) {

        //TODO - Fonction de Jérémie
        $salles = array(
            array(
                'id'    =>  1,
                'nom'   =>  'Salle 1',
                'code'  =>  'A001',
                'icon'  =>  TypeSalle::getIcon(TypeSalle::SALLE_CLASSE)
            ),
            array(
                'id'    =>  2,
                'nom'   =>  'Salle 2',
                'code'  =>  'A002',
                'icon'  =>  TypeSalle::getIcon(TypeSalle::LAB_ELECTRONIQUE)
            ),
            array(
                'id'    =>  3,
                'nom'   =>  'Salle 3',
                'code'  =>  'A001',
                'icon'  =>  TypeSalle::getIcon(TypeSalle::LAB_INFORMATIQUE)
            )
        ); //TODO - Jérémie


        if($salles) {
            $response['type']       = 'success';
            $response['salles']     = $salles;
        } else {
            $response['message']    = "Impossible de récupérer la liste des salles";
        }
    } else {
        //La date de debut doit être inférieure a celle de fin
        $response['message'] = "La date de debut doit être antérieure à la date de fin";
    }
} else {
    $response['message'] = "Un ou plusieurs paramètres sont manquants";
}

//Renvoyer la réponse au format JSON
die(json_encode($response));