<?php
/**
 * Created by Tristan LE GACQUE on 25/08/2017
 */

/**
 * Résultat d'un query postgre
 * Tristan LE GACQUE 2017
 * @author tlegacque
 * @version 1.0
 * @package PostgreSQlLib
 */
class PgResult
{
    /**
     * Objet query
     * @var resource
     * @access private;
     */
    private $query;


    /**
     * PgResult constructor.
     * @param $query_res
     */
    public function __construct($query_res){
        $this->query = $query_res;
    }

    /**
     * Récupère un tableau associatif
     * @return array
     */
    public function fetch_assoc() {
        return pg_fetch_assoc($this->query);
    }

    /**
     * Récupère le nombre de lignes
     * @return int
     */
    public function num_rows() {
        return pg_num_rows($this->query);
    }

    /**
     * Récupère le nombre de lignes affectées
     * @return int
     */
    public function affected_rows() {
        return pg_affected_rows($this->query);
    }
}

?>