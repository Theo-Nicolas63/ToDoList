<?php
require_once "Visiteur.php";

class Utilisateur
{
    private $mail;
    private $mdp;
    private $listeTaches;

    public function __construct(string $mail, string $mdp)
    {
        $this->mail=$mail;
        $this->mdp=$mdp;
    }
}