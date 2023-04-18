<?php


class Nettoyage
{
    public static function nettoyer_string($mot){
        global $rep, $vues;
        $mot = filter_var($mot, FILTER_SANITIZE_STRING);
        if($mot == false){
            $erreur = "Chaine de caractère invalide";
            require($rep.$vues['erreur']);
            exit;
        }
        else return $mot;
    }

    public static function nettoyer_int($entier){
        global $rep, $vues;
        $entier = filter_var($entier, FILTER_SANITIZE_NUMBER_INT);
        if($entier == false){
            $erreur = "Entier invalide";
            require($rep.$vues['erreur']);
            exit;
        }
        else return $entier;
    }

    public static function nettoyer_mail($mail){
        global $rep, $vues;
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if($mail == false){
            $erreur = "Email invalide";
            require($rep.$vues['erreur']);
            exit;
        }
        else return $mail;
    }
}