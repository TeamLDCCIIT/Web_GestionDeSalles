<?php
/**
 * Created by Tristan LE GACQUE on 12/01/2018
 */

namespace lib\objets;


class Utilisateur{

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
    private $prenom;

    /**
     * @var string
     */
    private $login;

    /**
     * @var $groupe
     * TODO : Faire un enum
     */
    private $groupe;

    /**
     * @var Campus
     */
    private $campus;

    /**
     * Utilisateur constructor.
     * @param int $id
     * @param string $nom
     * @param string $prenom
     * @param string $login
     * @param $groupe
     * @param Campus $campus
     */
    public function __construct($id, $nom, $prenom, $login, $groupe, Campus $campus)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->groupe = $groupe;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @return Campus
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Renvoies la liste de tous les utilisateurs
     * @param $database \MySqlLib
     * @return array liste des objets 'Utilisateur'
     */
    public static function getUtilisateurArray($database) {
        $query  = "SELECT id_utilisateur, id_campus, login, nom, prenom, groupe FROM utilisateur";
        $result = $database->query($query);

        $utilisateurArray = array();
        while($row = $result->fetch_assoc()) {
            array_push($utilisateurArray,
                new Utilisateur($row['id_utilisateur'], $row['nom'], $row['prenom'], $row['login'], $row['groupe'],
                    Campus::getCampusByID($database, $row['id_campus'])));
        }

        return $utilisateurArray;
    }

    /**
     * Retourne l'objet utilisateur correspondant à l'identifiant passé en paramètre
     * @param $database \MySqlLib
     * @param $id int Identifiant de l'utilisateur
     * @return Utilisateur
     * @throws \ErrorException Si l'utilisateur n'existe pas
     */
    public static function getUtilisateurByID($database, $id) {
        $query  = "SELECT id_utilisateur, id_campus, login, nom, prenom, groupe 
                    FROM utilisateur WHERE id_utilisateur=".intval($id);
        $result = $database->query($query);

        if($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            return new Utilisateur($row['id_utilisateur'], $row['nom'], $row['prenom'], $row['login'], $row['groupe'],
                Campus::getCampusByID($database, $row['id_campus']));
        } else {
            throw new \ErrorException('L\'utilisateur recherché n\'existe pas : '.$id);
        }
    }

}