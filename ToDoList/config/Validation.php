<?php


class Validation
{
    static function validation_cout($cout)
    {
        if (!isset($cout) || $cout <= 0) {
            return 0;
        }
        $cout = Nettoyage::nettoyer_int($cout);
        return $cout;
    }

    static function validation_nom($nom)
    {
        if (!isset($nom) || $nom == "") {
            return "nouveau";
        }
        $nom = Nettoyage::nettoyer_string($nom);
        return $nom;
    }
}