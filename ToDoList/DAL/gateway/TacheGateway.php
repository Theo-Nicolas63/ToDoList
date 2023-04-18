<?php


class TacheGateway
{
    private $con;
    private $tabT;

    public function __construct($c){
        $this->con=$c;
    }

    public function findTaches($idliste):array{
        $query='SELECT * FROM TTACHE WHERE idliste=:idliste';
        $this->con->executeQuery($query,array(':idliste'=>array($idliste, PDO::PARAM_INT)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabT[] = new Tache($row['idtache'], $row['nom'], $row['cout'], $row['idliste']);
        }
        if (empty($this->tabT))
            return array();
        return $this->tabT;
    }

    public function checkTache(int $id, $ischecked){
        $query='UPDATE TTACHE SET checked =:ischecked WHERE idTache=:id';
        $this->con->executeQuery($query, array('id'=>array($id, PDO::PARAM_INT), ':ischecked'=>array($ischecked, PDO::PARAM_INT)));
    }

    public function supprTache($id){
        $query='DELETE FROM TTACHE WHERE idTache=:id';
        $this->con->executeQuery($query, array('id'=>array($id, PDO::PARAM_INT)));
    }

    public function supprimerTacheByidListe(int $id){
        $query='DELETE FROM TTACHE WHERE idliste=:id';
        $this->con->executeQuery($query, array('id'=>array($id, PDO::PARAM_INT)));
    }

    public function ajouterTache($nom, $cout, $idListe){
        $query='INSERT INTO TTACHE VALUES(NULL, :nom, :cout, :idListe, 0)';
        $this->con->executeQuery($query, array('nom'=>array($nom, PDO::PARAM_STR), ':cout'=>array($cout, PDO::PARAM_INT), ':idListe'=>array($idListe, PDO::PARAM_INT)));
    }

    public function isCheckedTache($id):int {
        $query='SELECT checked FROM TTACHE WHERE idtache=:id';
        $this->con->executeQuery($query, array('id'=>array($id, PDO::PARAM_INT)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $check = $row['checked'];
        }
        return $check;
    }
}