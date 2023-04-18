<?php

class ListeGateway
{
    private $con;
    private $tabT = [];
    private $tErreur;

    public function __construct($c){
        $this->con=$c;
    }

    public function ajouterListe(int $visible, string $nom, $mail){
        $query='INSERT INTO TLISTE VALUES(NULL, :visible, :mail, :nom)';
        $this->con->executeQuery($query, array(':visible' => array($visible, PDO::PARAM_INT),
            ':nom' => array($nom, PDO::PARAM_STR),
            ':mail' => array($mail, PDO::PARAM_STR)));
    }

    public function findAllListePub(): array {
        $query='SELECT * FROM TLISTE where public = 1';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabT[] = new Liste($row['idliste'], $row['nom']);
        }
        return $this->tabT;
    }

    public function findAllListeprivee(string $mail){
        $query='SELECT * FROM TLISTE WHERE public = 0 AND mail=:mail';
        $this->con->executeQuery($query, array(':mail' => array($mail, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabT[] = new Liste($row['idliste'], $row['nom']);
        }
        return $this->tabT;
    }

    public function supprListe(int $id){
        $query='DELETE FROM TLISTE WHERE idListe=:id';
        $this->con->executeQuery($query, array(':id'=>array($id, PDO::PARAM_INT)));
    }

    public function findidListeByidTache($id){
        $query='SELECT idliste FROM TTACHE WHERE idtache=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $result = $this->con->getResult();
        $idlist = $result['idliste'];
        return $idlist;
    }

    public function findListe($id){
        $query='SELECT * FROM TLISTE WHERE idliste=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $list = new Liste($row['idliste'], $row['nom']);
        }
        return $list;
    }

    public function isPrive($id){
        $query='SELECT public FROM TLISTE WHERE idliste=:id';
        $this->con->executeQuery($query, array('id' => array($id, PDO::PARAM_INT)));
        $result = $this->con->getResult();
        return $result['public'];
    }
}