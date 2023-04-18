<?php


class Tache
{
    private $idtache;
    private $nom;
    private $cout;
    private $idliste;

    public function __construct(int $idtache, string $nom, int $cout, int $idliste){
        $this->idtache=$idtache;
        $this->cout=$cout;
        $this->nom=$nom;
        $this->idliste=$idliste;
    }

    /**
     * @return int
     */
    public function getIdtache(): int
    {
        return $this->idtache;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getCout(): int
    {
        return $this->cout;
    }

    /**
     * @return int
     */
    public function getIdliste(): int
    {
        return $this->idliste;
    }

}