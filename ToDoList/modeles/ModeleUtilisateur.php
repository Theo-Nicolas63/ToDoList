<?php


class  ModeleUtilisateur
{
    function Utilisateur_existe(){
        global $dsn, $username, $password;
        $ug = new UtilisateurGateway();
    }

    static function est_Utilisateur():bool{
        if(isset($_SESSION['role']) && isset($_SESSION['mail'])){
            if($_SESSION['role'] == "Utilisateur") {
                return true;
            }
        }
        else return false;
    }

    static function connexion(string $mail, string $mdp): bool{
        global $dsn, $username, $password;
        $ug = new UtilisateurGateway(new Connexion($dsn, $username, $password));

        $mail = Nettoyage::nettoyer_string($mail);
        $mdp = Nettoyage::nettoyer_string($mdp);

        if($ug->findUser($mail, $mdp)) {
            $_SESSION['role'] = "Utilisateur";
            $_SESSION['mail'] = $mail;
            return true;
        }
        else return false;
    }
}