<?php

class ModeleListe
{
    public static function getlistPublique(): array{
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        return $listgw->findAllListePub();
    }

    public static function getListePrive($mail): array{
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        return $listgw->findAllListeprivee($mail);
    }

    public static function ajouterListePublique($nom){
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        $nom = Validation::validation_nom($nom);
        $listgw->ajouterListe(1, $nom, NULL);
    }

    public static function ajouterListePrive($nom, $mail){
        global $dsn, $username, $password, $rep, $vues, $erreur;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));

        $nom = Validation::validation_nom($nom);

        if ($erreur == "nom invalide"){
            require($rep.$vues['erreur']);
            exit();
        }
        $listgw->ajouterListe(0, $nom, $mail);
    }

    public static function supprimerListe($id){
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        $listgw->supprListe($id);
    }

    public static function getListe(int $id){
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        return $listgw->findListe($id);
    }

    public static function isPrive(int $id){
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        return $listgw->isPrive($id);
    }

    public static function getListeByidTache(int $id): int{
        global $dsn, $username, $password;
        $listgw = new ListeGateway(new connexion($dsn, $username, $password));
        return $listgw->findidListeByidTache($id);
    }
}