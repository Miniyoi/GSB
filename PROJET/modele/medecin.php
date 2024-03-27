<?php

class MEDECIN{
    private  $idMedecin;
    private  $nom;
    private  $prenom;
    private  $adresse;
    private  $CP;
    private  $tel;
    private  $specialiteComplementaire;
    private  $département;

    public function __construct ($idMedecin,$nom,$prenom,$adresse,$CP,$tel,$specialiteComplementaire,$département){
        $this->idMedecin = $idMedecin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->CP = $CP;
        $this->tel = $tel;
        $this->specialiteComplementaire = $specialiteComplementaire;
        $this->département = $département;
    }
    public function getidMedecin(){
        return $this->idMedecin;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function getadresse(){
        return $this->adresse;
    }
    public function getCP(){
        return $this->CP;
    }
    public function gettel(){
        return $this->tel;
    }
    public function getspecialiteComplementaire(){
        return $this->specialiteComplementaire;
    }
    public function getdépartement(){
        return $this->département;
    }
    public function setidMedecin($idMedecin){
        $this->idMedecin = $idMedecin;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function setadresse($adresse){
        $this->adresse = $adresse;
    }
    public function setCP($CP){
        $this->CP = $CP;
    }
    public function settel($tel){
        $this->tel = $tel;
    }
    public function setspecialiteComplementaire($specialiteComplementaire){
        $this->specialiteComplementaire = $specialiteComplementaire;
    }
    public function setdépartement($département){
        $this->département = $département;
    }
}
?>