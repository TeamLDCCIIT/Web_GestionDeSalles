<?php
/**
 * Created by Tristan LE GACQUE on 28/08/2017
 */

class TypeSalle extends BasicEnum {

    const INCONNU           = 0;
    const SALLE_CLASSE      = 1;
    const SALLE_REUNION     = 2;
    const AMPHI             = 3;
    const LAB_INFORMATIQUE  = 4;
    const LAB_ELECTRONIQUE  = 5;
    const DIVERS            = 6;

    /**
     * Récupère le nom du type en question
     * @param $type integer TypeSalle (Identifiant)
     * @return string Nom du type
     */
    public static function getName($type) {
        switch ($type) {
            case TypeSalle::INCONNU:
                return "Inconnu";
            case TypeSalle::DIVERS:
                return "Divers";
            case TypeSalle::SALLE_CLASSE:
                return "Salle de classe";
            case TypeSalle::SALLE_REUNION:
                return "Salle de reunion";
            case TypeSalle::AMPHI:
                return "Amphi";
            case TypeSalle::LAB_INFORMATIQUE:
                return "Lab. Informatique";
            case TypeSalle::LAB_ELECTRONIQUE:
                return "Lab. Electronique";
            default:
                return "Inconnu";
        }
    }

    /**
     * Récupère l'icon correspondant à la salle
     * @param $type
     * @return string
     */
    public static function getIcon($type) {
        switch ($type) {
            case TypeSalle::INCONNU:
                return "";
            case TypeSalle::DIVERS:
                return "question";
            case TypeSalle::SALLE_CLASSE:
                return "book";
            case TypeSalle::SALLE_REUNION:
                return "group";
            case TypeSalle::AMPHI:
                return "institution";
            case TypeSalle::LAB_INFORMATIQUE:
                return "desktop";
            case TypeSalle::LAB_ELECTRONIQUE:
                return "microchip";
            default:
                return "";
        }
    }

    /**
     * Récupère le type correspondant au nom
     * @param $nom string
     * @return int
     */
    public static function findTypeSalle($nom) {
        switch(strtolower($nom)) {
            case "salle de classe":
                return TypeSalle::SALLE_CLASSE;
            case "salle de reunion":
                return TypeSalle::SALLE_REUNION;
            case "amphi":
                return TypeSalle::AMPHI;
            case "lab. informatique":
                return TypeSalle::LAB_INFORMATIQUE;
            case "lab. electronique":
                return TypeSalle::LAB_ELECTRONIQUE;
            case "divers":
                return TypeSalle::DIVERS;
            default:
                return TypeSalle::INCONNU;
        }
    }

}