<?php

class UtilisateurGateway
{
    private $con;
    private $Terreur = [];

    public function __construct($c){
        $this->con=$c;
    }

    public function findUser($mail, $mdp): bool{
        $query = 'SELECT * FROM tutilisateur where mail=:mail ';
        $this->con->executeQuery($query, array(':mail' => array($mail, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if (isset($result[0]['mail'])) {
            return password_verify($mdp, $result[0]['mdp']);
        }
        else return false;
    }
}