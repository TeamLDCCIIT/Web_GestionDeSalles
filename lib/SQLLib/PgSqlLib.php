<?php
/**
 * Created by Tristan LE GACQUE on 25/08/2017
 */

/**
 * Classe permetant l'interaction avec une base de donnée MySQL
 * Tristan LE GACQUE 2017
 * @author tlegacque
 * @version 1.0
 * @package PostgreSQlLib
 */
class PgSqlLib
{
    /**
     * Connecteur mysqli
     * @var PgConnect
     * @access private;
     */
    private $connection;

    /**
     * PostgreSQlLib constructor.
     * Créer un objet PostgreSQlLib pour interagit avec la base de données
     * Se connecte avec les indentifiants stockés dans les fichiers de configuration
     * @param string $db Base de données à utiliser
     * @param string $host Hote sur lequel est hebergé la base de données
     * @param string $login Identifiant pour se connecter
     * @param string $password Mot de passe associé à l'identifiant
     */
    public function __construct($db = _sql_db, $host = _sql_host, $login =_sql_login, $password = _sql_password)  {
        $this->connect($host, $login, $password, $db);
    }



    /**
     * Methode connect, permettant de se connecter à la base de données
     * @param string $host Hote sur lequel est hebergé la base de données
     * @param string $login Identifiant pour se connecter
     * @param string $password Mot de passe associé à l'identifiant
     * @param string $database Base de données à utiliser
     */
    private function connect($host, $login, $password, $database) {
        //Créer la connection
        $connectString = "host=".$host." dbname=".$database." user=".$login." password=".$password;
        $connect = new PgConnect(pg_connect($connectString));

        if(!$connect) {
            $messageErreur = 'Erreur de connexion a la base de donnees POSTGRESQL';
            if(_debug) {
                $messageErreur.=
                    ' <br /> Host : ' . $host .
                    ' <br /> login: ' . $login .
                    ' <br /> Password : ' . $password .
                    ' <br /> DB : ' . $database;
            }

            die($messageErreur);
        }

        //On défini la connexion en UTF-8
        $connect->set_charset('utf8');

        //On enregistre la connexion
        $this->connection = $connect;
    }


    /**
     * Methode close, permet de fermer la connexion à la base de données
     */
    public function close() {
        $this->connection->close();
    }


    /**
     * Methode query, envoi une requête à la base de données (SELECT, SHOW, DESCRIPE ou EXPLAIN)
     * @throws ErrorException Exception si la requête ne s'execute pas bien
     * @param string $requete Requête SQL à envoyer
     * @return PgResult Resultat de la requête
     */
    public function query($requete) {
        $resultat = $this->connection->query($requete);

        //Si la requête reussit
        if($resultat) {
            return $resultat;
        } else {
            throw new ErrorException("Erreur dans la requête SQL : '" . $requete . "'");
        }
    }

    /**
     * Methode execute, envoi une requête à la base de données (INSERT, UPDATE, DELETE)
     * @param string $requete Requête SQL à executer
     * @return bool TRUE si la requête reussit, FALSE sinon
     */
    public function execute($requete) {
        $resultat = $this->connection->query($requete);
        return $resultat !== FALSE;
    }


    /**
     * Methode purify, protège la variable des Injections SQL
     * @param string $var Variable à proteger
     */
    public function purify(&$var) {
        if(is_string($var)) {
            $var = $this->connection->real_escape_string($var);
        }
    }

    /**
     * Methode getLastError, retourne la dernière erreur produite par une requête SQL
     * @return string Erreur sous forme de chaine de caractères
     */
    public function getLastError() {
        return $this->connection->getLastError();
    }
}