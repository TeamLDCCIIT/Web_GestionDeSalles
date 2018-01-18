<?php

$db = new PgSqlLib();
$debut = '2018-04-20 12:34:10';
$fin = '2018-04-20 14:59:54';

$list = listeLibreAt2($db, $debut, $fin);

while($ligne = $list->fetch_assoc()){
    echo $ligne['id_salle'];
    echo "\n";
}

die();