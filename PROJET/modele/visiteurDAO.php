<?php
class VISITEURDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();        
    }

    public function ajout($VISITEUR){
        try{
            $req=$this->conn->prepare("INSERT INTO VISITEUR (idVisiteur, nom, prenom, logins, mdp, adresse, CP, ville, dateEmbauche) values (:idVisiteur, :nom, :prenom, :logins, :mdp, :adresse, :CP, :ville, :dateEmbauche)");
            $req -> bindValue(':idVisiteur',$VISITEUR->getidVisiteur());
            $req -> bindValue(':nom',$VISITEUR->getnom());
            $req -> bindValue (':prenom',$VISITEUR->getprenom());
            $req -> bindValue (':logins',$VISITEUR->getlogins());
            $req -> bindValue (':mdp',$VISITEUR->getmdp());
            $req -> bindValue (':adresse',$VISITEUR->getadresse());
            $req -> bindValue (':CP',$VISITEUR->getCP());
            $req -> bindValue (':ville',$VISITEUR->getville());
            $req -> bindValue (':dateEmbauche',$VISITEUR->getdateEmbauche());
            $req->execute();
        }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();            
        die();
        }
    }

    public function updateVisiteur($VISITEUR){
        try{
            $req = $this->conn->prepare("UPDATE VISITEUR SET nom=:nom, prenom=prenom, logins=:logins, mdp=:mdp,adresse=:adresse,CP=:CP,ville=:ville,dateEmbauche=:dateEmbauche WHERE idVisiteur=:idVisiteur");
            $req -> bindValue(':idVisiteur',$VISITEUR->getidVisiteur());
            $req -> bindValue(':nom',$VISITEUR->getnom());
            $req -> bindValue (':prenom',$VISITEUR->getprenom());
            $req -> bindValue (':logins',$VISITEUR->getlogins());
            $req -> bindValue (':mdp',$VISITEUR->getmdp());
            $req -> bindValue (':adresse',$VISITEUR->getadresse());
            $req -> bindValue (':CP',$VISITEUR->getCP());
            $req -> bindValue (':ville',$VISITEUR->getville());
            $req -> bindValue (':dateEmbauche',$VISITEUR->getdateEmbauche());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteVisiteur($VISITEUR){
        try{
            $req = $this->conn->prepare("DELETE FROM VISITEUR WHERE idVisiteur=:idVisiteur");
            $req -> bindValue(':idVisiteur',$VISITEUR->getidVisiteur());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurs(){
        try{
            
            $req=$this->conn->prepare("SELECT * FROM visiteur");

            $req->execute();
            
            $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
            if($resultat){
                foreach($resultat as $ligne){
                    $visiteur = new Visiteur(
                        $ligne["idVisiteur"],
                        $ligne["nom"],
                        $ligne["prenom"],
                        $ligne["logins"],
                        $ligne["mdp"],
                        $ligne["adresse"],
                        $ligne["CP"],
                        $ligne["ville"],
                        $ligne["dateEmbauche"]
                    );
                    $visiteurs[]=$visiteur;
                }
                return $visiteurs;
            }
            else{
                return null;
            }
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    public function getVisiteurByLogin($logins){
        try{
            $req = $this->conn->prepare("SELECT * FROM VISITEUR WHERE logins=:logins");
            $req -> bindValue(':logins',$logins);
            
            $req->execute();
            
            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                $resultat["idVisiteur"],
                $resultat["nom"],
                $resultat["prenom"],
                $resultat["logins"],
                $resultat["mdp"],
                $resultat["adresse"],
                $resultat["CP"],
                $resultat["ville"],
                $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }
        }catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}