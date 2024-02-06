<?php
class MEDICAMENTDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function ajout($MEDICAMENT){
        try{
            $req=$this->conn->prepare("INSERT INTO MEDICAMENT(idMedicament,nomCommercial,Composition,effets,contreIndications) values (:idMedicament,:nomCommercial,:Composition,:effets,:contreIndications)");
            $req -> bindValue(':idMedicament',$MEDICAMENT->getidMedicament());
            $req -> bindValue(':nomCommercial',$MEDICAMENT->getnomCommercial());
            $req -> bindValue (':Composition',$MEDICAMENT->getComposition());
            $req -> bindValue (':effets',$MEDICAMENT->geteffets());
            $req -> bindValue (':contreIndications',$MEDICAMENT->getcontreIndications());
            $req->execute();
        }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();            
        die();
        }
    }

    public function update($MEDICAMENT){
        try{
            $req = $this->conn->prepare("UPDATE MEDICAMENT SET nomCommercial=:nomCommercial,Composition=:Composition,effets=:effets,contreIndications=:contreIndications WHERE idFamille=:idfamille");
            $req -> bindValue(':idMedicament',$MEDICAMENT->getidMedicament());
            $req -> bindValue(':nomCommercial',$MEDICAMENT->getNomCommercial());
            $req -> bindValue (':Composition',$MEDICAMENT->getComposition());
            $req -> bindValue (':effets',$MEDICAMENT->geteffets());
            $req -> bindValue (':contreIndications',$MEDICAMENT->getcontreIndications());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function delete($MEDICAMENT){
        try{
            $req = $this->conn->prepare("DELETE FROM MEDICAMENT WHERE idMedicament=:idMedicament");
            $req -> bindValue(':idMedicament',$MEDICAMENT->getidMedicament());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}