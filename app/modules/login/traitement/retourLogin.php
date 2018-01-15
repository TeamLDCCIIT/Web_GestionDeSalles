<?php
/**
 * Created by Jérémie on 15/01/2018
 */

$login = isset($_GET['InputUsername']) ? strval($_GET['InputUsername']) : null;
$mdp = isset($_GET['InputPassword']) ? strval($_GET['InputPassword']) : null;
echo $login;

$db = new PgSqlLib();
$req = "SELECT groupe FROM Utilisateur WHERE Utilisateur.login = '".$login."' AND Utilisateur.password = '".$mdp."'";
$result = $db->query($req);

if(!$result){
    $type_res = 'error';
    $msg = "login error";
} else {
    $resultat = $result->fetch_assoc();
    $groupe = $resultat['groupe'];
    $_SESSION['user']['username'] = $login;
    $_SESSION['user']['group'] = array($groupe);
    $type_res = 'success';
    $msg = "PAPA DANS MAMAN ";
    $db->close();
};


$response = array(
        "type"  =>  $type_res, //(error)
        "message"   =>  $msg
);

die(json_encode($response));