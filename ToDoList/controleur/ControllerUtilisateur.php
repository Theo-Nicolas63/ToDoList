<?php


class ControllerUtilisateur
{
    function __construct($action){
        global $rep, $vues, $erreur;
        try {
            switch ($action){
                case "ajouterListePrive":
                    $this->ajouterListePrive();
                    break;
                case  "seDeconnecter":
                    $this->deconnexion();
                    break;
                case "affichVuePrive" :
                    $this->afficherListePrive();
                    break;
                default:
                    throw new \Exception('Unexpected value');
                }
            }

        catch(PDOException $e)
        {
            $erreur = "Erreur PDO";
            require('erreur.php');
        }
        catch (Exception $e2)
        {
            $erreur = "Erreur";
            require($rep.$vues['erreur']);
        }
    }

    function afficherListePrive(){
        global $rep, $vues;
        $mail = $_SESSION['mail'];
        $listPriv = ModeleListe::getListePrive($mail);
        foreach ($listPriv as $l){
            $l->setListTaches(ModeleTache::getTaches($l->getidListe()));
        }
        require($rep.$vues['prive']);
    }

    function ajouterListePrive(){
        global $rep, $vues;
        $nom = $_REQUEST['Nom'];
        $mail = $_SESSION['mail'];
        ModeleListe::ajouterListePrive($nom, $mail);
        header('Refresh:0;url=index.php?action=affichVuePrive');

    }

    function deconnexion(){
        global $rep, $vues;
        session_destroy();
        header('Refresh:0;url=index.php');
    }
}

