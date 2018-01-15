<?php
/**
 * Created by Tristan LE GACQUE on 25/08/2017
 */

/**
 * Connexion postgre
 * Tristan LE GACQUE 2017
 * @author tlegacque
 * @version 1.0
 * @package PostgreSQlLib
 */
class PgConnect
{
    /**
     * Connecteur postgre
     * @var resource
     * @access private;
     */
    private $connection;


    /**
     * PgConnect constructor.
     * @param $resource
     */
    public function __construct($resource){
        $this->connection = $resource;
    }

    /**
     * Défini l'encodage de caractère
     * @param $charset string
     */
    public function set_charset($charset = 'UTF-8') {
        pg_set_client_encoding($this->connection, $charset);
    }

    /**
     * Effectue une requete query
     * @param $query string requete SQL
     * @return PgResult
     */
    public function query($query) {
        return new PgResult(pg_query($this->connection, $query));
    }

    /**
     * Ferme la connexion postegre
     * @return bool
     */
    public function close() {
        return pg_close($this->connection);
    }

    /**
     * Echappe la chaien de caractère pour la proteger
     * @param $string string chaine de caractères
     * @return string
     */
    public function real_escape_string($string) {
        return pg_escape_string($this->connection, $string);
    }

    /**
     * Retourne la derniere erreur
     * @return string
     */
    public function getLastError() {
        return pg_last_error($this->connection);
    }
}

?>