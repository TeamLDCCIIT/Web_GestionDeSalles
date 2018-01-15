<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/listeDesSalles.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Liste des salles');
$__template->setVar('page_title', 'Liste des salles');

//Définition des variables
$etages = array();
$campus = array();
$types  = array();

$db = new PgSqlLib();

//Récupération des valeurs
$queryEtage     = "SELECT DISTINCT etage FROM salles GROUP BY etage ORDER BY etage ASC";
$queryCampus    = "SELECT id_campus, nom FROM campus";

//Etage
$result = $db->query($queryEtage);
while($row = $result->fetch_assoc()) {
    array_push($etages, array(
        'key'   => intval($row['etage']),
        'value' => $row['etage']
    ));
}

//Campus
$result = $db->query($queryCampus);
while($row = $result->fetch_assoc()) {
    array_push($campus, array(
        'key'   =>  $row['id_campus'],
        'value' => $row['nom']
    ));
}

//Type
foreach(TypeSalle::getValues() as $type) {
    if($type !== TypeSalle::INCONNU) {
        array_push($types, array(
            'key'   => $type,
            'value' => TypeSalle::getName($type)
        ));
    }
}

//Ajout des filtres
$template->setVar('etages', $etages);
$template->setVar('campus', $campus);
$template->setVar('types', $types);

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');