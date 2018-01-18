<?php
/**
 * Created by Jérémie on 15/01/2018
 */

//Récupérer le login/mdp
$login = isset($_POST['InputUsername']) ? strval($_POST['InputUsername']) : null;
$mdp = isset($_POST['InputPassword']) ? strval($_POST['InputPassword']) : null;
//Encoder le mdp
$mdp = hash('sha256',$mdp);
//Connexion à la DB puis requête
$db = new PgSqlLib();
$req = "SELECT id_utilisateur,groupe FROM Utilisateur WHERE Utilisateur.login = '".$login."' AND Utilisateur.password = '".$mdp."'";
$result = $db->query($req);
//Authentification et affectation de la variable $_SESSION
if($result->num_rows() !== 1){
    $type_res = 'error';
    $msg = "Erreur de connexion";
} else {
    $resultat = $result->fetch_assoc();
    $id_utilisateur = $resultat['id_utilisateur'];
    $groupe = $resultat['groupe'];
    $_SESSION['user']['id_utilisateur'] = $id_utilisateur;
    $_SESSION['user']['username'] = $login;
    $_SESSION['user']['group'] = array($groupe);
    $type_res = 'success';
    $msg = "Connexion reussie";

};
//Fermeture de la connexion
$db->close();
//Mise en forme de la sortie
$response = array(
        "type" => $type_res,
        "message" => $msg
);
//Envoi du message de sortie
die(json_encode($response));