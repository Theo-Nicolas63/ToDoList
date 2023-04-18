<?php


class Liste
{
    private $idliste;
    private $nom;
    private $listTaches = array();

    public function __construct(int $idliste, string $nom){
        $this->idliste=$idliste;
        $this->nom=$nom;
    }

    /**
     * @return int
     */
    public function getidListe(): int
    {
        return $this->idliste;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param array $listTaches
     */
    public function setListTaches(array $listTaches): void
    {
        $this->listTaches = $listTaches;
    }

    public function getListTaches():array
    {
        return $this->listTaches;
    }
}