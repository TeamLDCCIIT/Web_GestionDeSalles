<?php
/**
 * Created by Tristan LE GACQUE on 25/08/2017
 */

/**
 * Classe permetant l'interaction avec une base de donnée MySQL
 * Tristan LE GACQUE 2017
 * @author tlegacque
 * @version 1.0
 * @package MySqlLib
 */
class MySqlLib
{
    /**
     * Connecteur mysqli
     * @var mysqli
     * @access private;
     */
    private $connection;

    /**
     * MySqlLib constructor.
     * Créer un objet MySqlLib pour interagit avec la base de données
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
        $connect = new mysqli($host, $login, $password, $database);

        if($connect->connect_error) {
            $messageErreur = 'Erreur de connexion a la base de donnees MySQL(' . $connect->connect_errno . ') ' . $connect->connect_error;
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
     * @return mysqli_result Resultat de la requête
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
        return $resultat;
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
        return $this->connection->error;
    }

    /**
     * Methode getInsertedId, retourne l'identifiant de la dernière execution effectuée (INSERT, UPDATE)
     * Si la table ne possède pas de colonne AUTO_INCREMENT, la valeur 0 sera retournée
     * @return integer Valeur de la dernière ligne crée (Colonne AUTO_INCREMENT), 0 sinon
     */
    public function getInsertedId() {
        return $this->connection->insert_id;
    }

    /**
     * Methode getAffectedRows, retourne le nombre de lignes affectées par le dernier execute() (INSERT, UPDATE, DELETE)
     * @return integer
     */
    public function getAffectedRows() {
        return $this->connection->affected_rows;
    }
}