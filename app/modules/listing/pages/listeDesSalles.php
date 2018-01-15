<?php
//Définition du template
$template = new \Tpl\Template(__DIR__ . '/../templates/listeDesSalles.html');

//Définition des variables générales
$__template->setVar('pagetitle', 'Liste des salles');
$__template->setVar('page_title', 'Liste des salles');

$salles = \lib\objets\Salle::getSalleArray(new PgSqlLib());

    /*
$salles = array(
    array(
        'nom'   =>  'Broglie',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Langevin',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Lab. Electronique'
    ),
    array(
        'nom'   =>  'Yolo',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Blablacar',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Broglie',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Langevin',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Lab. Electronique'
    ),
    array(
        'nom'   =>  'Yolo',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Blablacar',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Broglie',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Langevin',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Lab. Electronique'
    ),
    array(
        'nom'   =>  'Yolo',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    ),
    array(
        'nom'   =>  'Blablacar',
        'code'  =>  'B007',
        'etage' =>  '0',
        'type'  =>  'Amphi'
    )
);
*/

//Ajout des salles
$template->setVar('salles', $salles);

//FIN - Render du template (compiler le template et l'afficher)
$template->render($__template, 'content');