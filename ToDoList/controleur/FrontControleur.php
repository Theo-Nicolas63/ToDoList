<?php


class FrontControleur
{
    public function __construct() {
        global $rep, $vues, $erreur;

        session_start();
        $listeAction_Utilisateur=array(
            'ajouterListePrive',
            'seDeconnecter',
            'affichVuePrive'
        );
        try{
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = NULL;
            }
            if(in_array($action, $listeAction_Utilisateur)){
                if(!ModeleUtilisateur::est_Utilisateur()){
                    require($rep.$vues['connexion']);
                }
                else $ctrlUtilisateur = new ControllerUtilisateur($action);
            }
            else {
                $ctrlVisiteur = new ControlleurVisiteur($action);
            }
        }
        catch(Exception $e) {
            $erreur = "Erreur";
            require($rep.$vues['erreur']);
        }
    }
}