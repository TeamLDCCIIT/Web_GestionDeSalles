<?php
/**
 * Created by Tristan LE GACQUE on 12/01/2018
 */

namespace lib\objets;


class Reservation{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $dateDebut;

    /**
     * @var string
     */
    private $dateFin;

    /**
     * @var Utilisateur
     */
    private $utilisateur;

    /**
     * @var Salle
     */
    private $salle;

    /**
     * Reservation constructor.
     * @param int $id
     * @param string $dateDebut
     * @param string $dateFin
     * @param Utilisateur $utilisateur
     * @param Salle $salle
     */
    public function __construct($id, $dateDebut, $dateFin, Utilisateur $utilisateur, Salle $salle)
    {
        $this->id = $id;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->utilisateur = $utilisateur;
        $this->salle = $salle;
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
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @return Salle
     */
    public function getSalle()
    {
        return $this->salle;
    }


    /**
     * Retourne l'objet Reservation correspondant à l'identifiant passé en paramètre
     * @param $database \PgSqlLib
     * @param $id int Identifiant de la reservation
     * @return Reservation
     * @throws \ErrorException Si la reservation n'existe pas
     */
    public static function getReservationByID($database, $id) {
        $query  = "SELECT id_res, id_salle, id_utilisateur, debut, fin
                    FROM reservation WHERE id_res=".intval($id);
        $result = $database->query($query);

        if($result->num_rows() === 1) {
            $row = $result->fetch_assoc();

            return new Reservation($row['id_res'], $row['debut'], $row['fin'],
                Utilisateur::getUtilisateurByID($database, $row['id_utilisateur']),
                Salle::getSalleByID($database, $row['id_salle']));
        } else {
            throw new \ErrorException('La réservation recherchée n\'existe pas : '.$id);
        }
    }
}