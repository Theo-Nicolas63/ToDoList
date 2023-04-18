<?php


class ModeleTache
{
    public static function getTaches(int $id): array{
        global $dsn, $username, $password;
        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        return $Tachegw->findTaches($id);
    }

    public static function supprimerTache(int $id){
        global $dsn, $username, $password;
        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        $Tachegw->supprTache($id);
    }

    public static function supprimerTacheByidListe(int $id){
        global $dsn, $username, $password;
        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        $Tachegw->supprimerTacheByidListe($id);
    }

    public static function ajouterTache($nom, $cout, int $idListe){
        global $dsn, $username, $password;

        $nom = Validation::validation_nom($nom);
        $cout = Validation::validation_cout($cout);

        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        $Tachegw->ajouterTache($nom, $cout, $idListe);
    }

    public static function checkTache(int $id, $ischecked){
        global $dsn, $username, $password;
        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        $Tachegw->checkTache($id, $ischecked);
    }

    public static function isCheckedTache($id): int{
        global $dsn, $username, $password;
        $Tachegw = new TacheGateway(new connexion($dsn, $username, $password));
        return $Tachegw->isCheckedTache($id);
    }
}