<?php
/**
 * Created by Tristan LE GACQUE on 12/01/2018
 */

namespace lib\objets;


class Campus{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $tel;

    /**
     * Campus constructor.
     * @param $id
     * @param $nom
     * @param $adresse
     * @param $tel
     */
    public function __construct($id, $nom, $adresse, $tel)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->tel = $tel;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Renvoies la liste de tous les campus disponibles
     * @param $database \PgSqlLib
     * @return array liste des objets 'Campus'
     */
    public static function getCampusArray($database) {
        $query  = "SELECT id_campus, nom, adresse, tel FROM campus";
        $result = $database->query($query);

        $campusArray = array();
        while($row = $result->fetch_assoc()) {
            array_push($campusArray, new Campus($row['id_campus'], $row['nom'], $row['adresse'], $row['tel']));
        }

        return $campusArray;
    }

    /**
     * Retourne l'objet campus correspondant à l'identifiant passé en paramètre
     * @param $database \PgSqlLib
     * @param $id int Identifiant du campus
     * @return Campus
     * @throws \ErrorException Si le campus n'existe pas
     */
    public static function getCampusByID($database, $id) {
        $query  = "SELECT id_campus, nom, adresse, tel FROM campus WHERE id_campus=".intval($id);
        $result = $database->query($query);

        if($result->num_rows() === 1) {
            $row = $result->fetch_assoc();

            return new Campus($row['id_campus'], $row['nom'], $row['adresse'], $row['tel']);
        } else {
            throw new \ErrorException('Le campus recherché n\'existe pas : '.$id);
        }
    }
}