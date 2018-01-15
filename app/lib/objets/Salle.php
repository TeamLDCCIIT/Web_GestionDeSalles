<?php
/**
 * Created by Tristan LE GACQUE on 12/01/2018
 */

namespace lib\objets;


class Salle{

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
    private $code;

    /**
     * @var string
     * TODO : Faire un enum
     */
    private $type;

    /**
     * @var string
     */
    private $etage;

    /**
     * @var Campus
     */
    private $campus;

    /**
     * Salle constructor.
     * @param int $id
     * @param string $nom
     * @param string $code
     * @param string $type
     * @param string $etage
     * @param Campus $campus
     */
    public function __construct($id, $nom, $code, $type, $etage, Campus $campus)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->code = $code;
        $this->type = $type;
        $this->etage = $etage;
        $this->campus = $campus;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @return Campus
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Renvoies la liste de toutes les salles
     * @param $database \MySqlLib
     * @return array liste des objets 'Salle'
     */
    public static function getSalleArray($database) {
        $query  = "SELECT id_salle, nom, code, id_campus, type_salle, etage FROM salles";
        $result = $database->query($query);

        $salleArray = array();
        while($row = $result->fetch_assoc()) {
            array_push($salleArray,
                new Salle($row['id_salle'], $row['nom'], $row['code'], $row['type_salle'], $row['etage'],
                    Campus::getCampusByID($database, $row['id_campus'])));
        }

        return $salleArray;
    }

    /**
     * Retourne l'objet salle correspondant à l'identifiant passé en paramètre
     * @param $database \MySqlLib
     * @param $id int Identifiant de la salle
     * @return Salle
     * @throws \ErrorException Si la salle n'existe pas
     */
    public static function getSalleByID($database, $id) {
        $query  = "SELECT id_salle, nom, code, id_campus, type_salle, etage 
                    FROM salles WHERE id_salle=".intval($id);
        $result = $database->query($query);

        if($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            return new Salle($row['id_salle'], $row['nom'], $row['code'], $row['type_salle'], $row['etage'],
                Campus::getCampusByID($database, $row['id_campus']));
        } else {
            throw new \ErrorException('La salle recherchée n\'existe pas : '.$id);
        }
    }

    /**
     * Retourne les objets salle correspondants a la clause WHERE
     * IMPORTANT : La clause where doit être protégée en amont
     * @param $database \MySqlLib
     * @param $where string clause WHERE
     * @return array Salles
     * @throws \ErrorException Si la salle n'existe pas
     */
    public static function getSallesWithCustomWhere($database, $where) {
        $query  = "SELECT id_salle, nom, code, id_campus, type_salle, etage 
                    FROM salles WHERE ".$where;
        $result = $database->query($query);

        $salles = array();
        while($row = $result->fetch_assoc()) {
            array_push($salles,
                new Salle($row['id_salle'], $row['nom'], $row['code'], $row['type_salle'], $row['etage'],
                    Campus::getCampusByID($database, $row['id_campus'])));
        }

        return $salles;
    }

}