<?php
class FamilleDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function ajoutFamille($FAMILLE){
        try{
            $req=$this->conn->prepare("INSERT INTO famille values (:idfamille,:libelle)");
            $req -> bindValue(':idfamille',$FAMILLE->getidFamille());
            $req -> bindValue(':libelle',$FAMILLE->getlibelle());
            $req->execute();
        }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();            
        die();
        }
    }

    public function updateFamille($FAMILLE){
        try{
            $req = $this->conn->prepare("UPDATE FAMILLE SET libelle=:libelle WHERE idFamille=:idfamille");
            $req -> bindValue(':idfamille',$FAMILLE->getidFamille());
            $req -> bindValue(':libelle',$FAMILLE->getlibelle());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteFamille($FAMILLE){
        try{
            $req = $this->conn->prepare("DELETE FROM FAMILLE WHERE idFamille=:idfamille");
            $req -> bindValue(':idfamille',$FAMILLE->getidFamille());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}