<?php
/**
 * Created by Tristan LE GACQUE on 15/01/2018
 */

$login = isset($_GET['login']) ? strval($_GET['login']) : null;
$mdp = isset($_GET['mdp']) ? strval($_GET['mdp']) : null;


<html>
	<head>
		<meta charset="utf-8"/>
		<title>Identifié</title>
	</head>
	<body>
		<?php $login = $_GET['login']; $mdp = $_GET['mdp']; ?>
		<label>Votre login :</label>
		<?php echo $login ?>
		</br>
		<label>Votre mot de passe :</label>
		<?php echo $mdp ?>
		</br>
		<?php $req = "SELECT login, motDePasse, numUtilisateur FROM Utilisateur WHERE Utilisateur.login = '".$login."' AND Utilisateur.motDePasse = '".$mdp."'"; ?>
		</br>
		<?php
				$connexion = new mysqli("localhost", "gpi2", "network", "projet");
				if ($connexion->connect_errno) {
					printf("Echec de la connexion : %s %s", $connexion->connect_errno, $connexion->connect_errno);
					exit();
				}
				$connexion->set_charset("utf-8");
				$result = $connexion->query($req);
				if (!$result) {
					echo "la requête ne s'est pas éxécutée </br>";
				} else {
					echo "la requête s'est bien passée</br>";
					$resultat = $result->fetch_assoc();
					$numeroUtilisateur = $resultat["numUtilisateur"];
					session_start();
					$_SESSION[’utilisateur’] = $numeroUtilisateur;
					if ($resultat["login"] == "root" && $resultat["motDePasse"] == "network") {
						echo "<a href=menuAdministrateur.php>Menu administrateur</a>";

					} else {
						echo "<a href=listeConcours.php>Liste des concours</a>";
					}
					$connexion->free();
				}
				$connexion->close();
		?>
		</br>

	</body>
</html>