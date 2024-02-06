<?php
class Famille{
    private $idFamille;
    private $libelle;

    public function __construct($idFamille,$libelle){
        $this->idFamille = $idFamille;
        $this->libelle = $libelle;
    }
    public function getidFamille(){
        return $this->idFamille;
    }
    public function getlibelle(){
        return $this->libelle;
    }
    public function setidFamille($idFamille){
        $this->idFamille = $idFamille;
    }
    public function setlibelle($libelle){
        $this->libelle = $libelle;
    }
}