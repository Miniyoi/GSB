<?php
class VISITEUR{
    private  $idVisiteur;
    private  $nom;
    private  $prenom;
    private $logins;
    private $mdp;
    private $adresse;
    private $CP;
    private $ville;
    private $dateEmbauche;

    public function __construct ($idVisiteur,$nom,$prenom,$logins,$mdp,$adresse,$CP,$ville,$dateEmbauche){
        $this->idVisiteur = $idVisiteur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->logins = $logins;
        $this->mdp = $mdp;
        $this->adresse = $adresse;
        $this->CP = $CP;
        $this->ville = $ville;
        $this->dateEmbauche = $dateEmbauche;
    }
    public function getidVisiteur(){
        return $this->idVisiteur;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function getlogins(){
        return $this->logins;
    }
    public function getmdp(){
        return $this->mdp;
    }
    public function getadresse(){
        return $this->adresse;
    }
    public function getCP(){
        return $this->CP;
    }
    public function getville(){
        return $this->ville;
    }
    public function getdateEmbauche(){
        return $this->dateEmbauche;
    }
    public function setidVisiteur($idVisiteur){
        $this->idVisiteur = $idVisiteur;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function setlogins($logins){
        $this->logins = $logins;
    }
    public function setmdp($mdp){
        $this->mdp = $mdp;
    }
    public function setadresse($adresse){
        $this->adresse = $adresse;
    }
    public function setCP($CP){
        $this->CP = $CP;
    }
    public function setville($ville){
        $this->ville = $ville;
    }
    public function setdateEmbauche($dateEmbauche){
        $this->dateEmbauche = $dateEmbauche;
    }
}