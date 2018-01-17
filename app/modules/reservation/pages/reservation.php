<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/reservation.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Réservation');
$__template->setVar('page_title', 'Réservation');

//récupération des campus
$campus = array();
$db = new PgSqlLib();
$queryCampus    = "SELECT id_campus, nom FROM campus";

//Campus
$result = $db->query($queryCampus);
while($row = $result->fetch_assoc()) {
    array_push($campus, array(
        'key'   => $row['id_campus'],
        'value' => $row['nom']
    ));
}

$template->setVar('campus', $campus);

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');