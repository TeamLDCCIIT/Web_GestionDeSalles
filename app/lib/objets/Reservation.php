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
     * @var string
     */
    private $motif;

    /**
     * Reservation constructor.
     * @param int $id
     * @param string $dateDebut format YY-MM-DD HH:II:SS
     * @param string $dateFin   format YY-MM-DD HH:II:SS
     * @param Utilisateur $utilisateur
     * @param Salle $salle
     */
    public function __construct($id, $dateDebut, $dateFin, Utilisateur $utilisateur, Salle $salle, $motif)
    {
        $this->id = $id;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->utilisateur = $utilisateur;
        $this->salle = $salle;
        $this->motif = $motif;
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
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }



    /**
     * Retourne l'objet Reservation correspondant à l'identifiant passé en paramètre
     * @param $database \PgSqlLib
     * @param $id int Identifiant de la reservation
     * @return Reservation
     * @throws \ErrorException Si la reservation n'existe pas
     */
    public static function getReservationByID($database, $id) {
        $query  = "SELECT id_res, id_salle, id_utilisateur, debut, fin, motif
                    FROM reservation WHERE id_res=".intval($id);
        $result = $database->query($query);

        if($result->num_rows() === 1) {
            $row = $result->fetch_assoc();

            return new Reservation($row['id_res'], $row['debut'], $row['fin'],
                Utilisateur::getUtilisateurByID($database, $row['id_utilisateur']),
                Salle::getSalleByID($database, $row['id_salle']), $row['motif']);
        } else {
            throw new \ErrorException('La réservation recherchée n\'existe pas : '.$id);
        }
    }

    /**
     * Récupère la liste des Reservation d'un utilisateur
     * @param $database \PgSqlLib
     * @param $user_id int
     * @return array
     * @throws \ErrorException
     */
    public static function getUserReservations($database, $user_id) {
        $query  = "SELECT id_res, id_salle, id_utilisateur, debut, fin, motif
                    FROM reservation WHERE id_utilisateur=".intval($user_id)." ORDER BY debut";
        $result = $database->query($query);

        if($result) {
            $reservations = array();
            while($row = $result->fetch_assoc()) {
                array_push($reservations, new Reservation($row['id_res'], $row['debut'], $row['fin'],
                    Utilisateur::getUtilisateurByID($database, $row['id_utilisateur']),
                    Salle::getSalleByID($database, $row['id_salle']), $row['motif']));
            }

            return $reservations;
        } else {
            throw new \ErrorException('Erreur de requête');
        }
    }

    /**
     * Enregistre une reservation, et renvoies vrai si l'enregistrement est reussi
     * @param $database \PgSqlLib
     * @param Reservation $reservation
     * @return boolean
     * @throws \ErrorException
     */
    public static function saveReservation($database, Reservation $reservation) {
        $id_salle   =   $reservation->getSalle()->getId();
        $id_user    =   $reservation->getUtilisateur()->getId();
        $debut      =   $reservation->getDateDebut();
        $fin        =   $reservation->getDateFin();
        $motif      =   $reservation->getMotif();
        $database->purify($motif);

        $query  = "INSERT INTO reservation(id_salle, id_utilisateur, debut, fin, motif) 
                    VALUES($id_salle, $id_user, '$debut', '$fin', '$motif')";

        $result = $database->execute($query);

        return $result;
    }
}