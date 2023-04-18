<?php

class ControlleurVisiteur
{
    function __construct($action){
        global $rep, $vues, $erreur;
        try {
            switch ($action) {
                case NULL:
                    $this->affichListePublique();
                    break;
                case "supprimerListe":
                    $this->supprimerListe();
                    break;
                case "ajouterListePublique":
                    $this->ajouterListePublique();
                    break;
                case "ajouterTache":
                    $this->ajouterTache();
                    break;
                case  "supprimerTache":
                    $this->supprimerTache();
                    break;
                case "afficherConnexion":
                    $this->afficherVueConnexion();
                    break;
                case "affichTache" :
                    $this->affichTache();
                    break;
                case "seconnecter":
                    $this->seConnecter();
                    break;
                case "checkTache" :
                    $this->checkTache();
                    break;
                default:
                    throw new \Exception('Unexpected value');
                }
            }

        catch(PDOException $e){
            $erreur = "Erreur PDO";
            require($rep.$vues['erreur']);
        }
        catch (Exception $e2)
        {
            $erreur = "Erreur j'sais pas quoi";
            require($rep.$vues['erreur']);
        }
    }

    private function affichListePublique(){
        global $rep, $vues;
        $listPub = ModeleListe::getlistPublique();
        foreach ($listPub as $l){
            $l->setListTaches(ModeleTache::getTaches($l->getidListe()));
        }
        require($rep.$vues['public']);
    }

    private function ajouterListePublique(){
        global $rep, $vues;
        $nom = $_REQUEST['Nom'];
        ModeleListe::ajouterListePublique($nom);
        header('Refresh:0;url=index.php');
    }

    private function afficherVueConnexion(){
        global $rep, $vues;
        require($rep.$vues['connexion']);
    }

    private function supprimerTache(){
        $id = $_REQUEST['idTache'];
        $idListe = ModeleListe::getListeByidTache($id);
        ModeleTache::supprimerTache($id);
        header('Refresh:0;url=index.php?action=affichTache&idListe='.$idListe);
    }

    private function supprimerListe(){
        $id = $_REQUEST['idListe'];
        $visible = ModeleListe::isPrive($id);
        ModeleTache::supprimerTacheByidListe($id);
        ModeleListe::supprimerListe($id);
        if($visible){
            header('Refresh:0;url=index.php');
        }
        else header('Refresh:0;url=index.php?action=affichVuePrive');
    }

    private function affichTache(){
        global $rep, $vues;
        $id = $_REQUEST['idListe'];
        $l = ModeleListe::getListe($id);
        $l->setListTaches(ModeleTache::getTaches($l->getidListe()));
        require($rep.$vues['tache']);
    }

    private function ajouterTache(){
        global $rep, $vues;
        $nom = $_REQUEST['Nom'];
        $cout = $_REQUEST['cout'];
        $idListe = $_REQUEST['idListe'];
        ModeleTache::ajouterTache($nom, $cout, $idListe);
        header('Refresh:0;url=index.php?action=affichTache&idListe='.$idListe);
    }

    private function seConnecter(){
        global $rep, $vues;
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        if (!ModeleUtilisateur::connexion($mail, $mdp)){
            $erreur = "problème de connexion";
            require($rep.$vues['erreur']);
        }
        header('Refresh:0;url=index.php?action=affichVuePrive');
    }

    public function checkTache(){
        global $rep, $vues;
        $id = $_REQUEST['idTache'];
        $idListe = $_REQUEST['idListe'];
        $ischecked = $_REQUEST['checked'];
        ModeleTache::checkTache($id, $ischecked);
        header('Refresh:0;url=index.php?action=affichTache&idListe='.$idListe);
    }
}