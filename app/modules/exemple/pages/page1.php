<?php

$db = new PgSqlLib();
$id_salle = 5;
$debut = '2018-04-21 12:34:10';
$fin = '2018-04-21 14:59:54';

$disp = isDispo($db, $id_salle, $debut, $fin);
$msg = $disp ? 'success' : 'error';
echo $msg;

die();