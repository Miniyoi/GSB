<?php
class RAPPORTDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function ajout($RAPPORT){
        try{
            $req=$this->conn->prepare("INSERT INTO RAPPORT (idRapport,dates,motif,bilan) values (:idRapport,:dates,:motif,:bilan)");
            $req -> bindValue(':idRapport',$RAPPORT->getidRapport());
            $req -> bindValue(':dates',$RAPPORT->getdates());
            $req -> bindValue (':motif',$RAPPORT->getmotif());
            $req -> bindValue (':bilan',$RAPPORT->getbilan());
            $req->execute();
        }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();            
        die();
        }
    }

    public function update($RAPPORT){
        try{
            $req = $this->conn->prepare("UPDATE RAPPORT SET dates=:dates,motif=:motif,bilan=:bilan WHERE idRapport=:idRapport");
            $req -> bindValue(':idRapport',$RAPPORT->getidRapport());
            $req -> bindValue(':dates',$RAPPORT->getdates());
            $req -> bindValue (':motif',$RAPPORT->getmotif());
            $req -> bindValue (':bilan',$RAPPORT->getbilan());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function delete($RAPPORT){
        try{
            $req = $this->conn->prepare("DELETE FROM RAPPORT WHERE idRapport=:idRapport");
            $req -> bindValue(':idRapport',$RAPPORT->getidRapport());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}