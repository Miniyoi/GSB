<?php
class MEDECINDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function ajoutMedecin($MEDICIN){
        try{
            $req=$this->conn->prepare("INSERT INTO MEDICIN (idMedicin, nom, prenom, adresse, CP, tel, specialiteComplementaire, département) values (:idMedicin, :nom, :prenom, :adresse, :CP, :tel, :specialiteComplementaire, :departement)");
            $req -> bindValue(':idMedicin',$MEDICIN->getidMedicin());
            $req -> bindValue(':nom',$MEDICIN->getnom());
            $req -> bindValue (':prenom',$MEDICIN->getadresse());
            $req -> bindValue (':adresse',$MEDICIN->getCP());
            $req -> bindValue (':CP',$MEDICIN->getCP());
            $req -> bindValue (':tel',$MEDICIN->gettel());
            $req -> bindValue (':specialiteComplementaire',$MEDICIN->getspecialiteComplementaire());
            $req -> bindValue (':departement',$MEDICIN->getdépartement());
            $req->execute();
        }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();            
        die();
        }
    }

    public function updateMedecin($MEDICIN){
        try{
            $req = $this->conn->prepare("UPDATE MEDICIN SET nom=:nom, prenom=prenom, adresse=:adresse,CP=:CP,tel=:tel,specialiteComplementaire=:specialiteComplementaire,departement=:departement WHERE idMedicin=:idMedicin");
            $req -> bindValue(':idMedicin',$MEDICIN->getidMedicin());
            $req -> bindValue(':nom',$MEDICIN->getnom());
            $req -> bindValue ('prenom',$MEDICIN->getprenom());
            $req -> bindValue (':adresse',$MEDICIN->getadresse());
            $req -> bindValue (':CP',$MEDICIN->getCP());
            $req -> bindValue (':tel',$MEDICIN->gettel());
            $req -> bindValue (':specialiteComplementaire',$MEDICIN->getspecialiteComplementaire());
            $req -> bindValue ('département',$MEDICIN->getdépartement());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteMedecin($MEDECIN){
        try{
            $req = $this->conn->prepare("DELETE FROM MEDECIN WHERE idMedicament=:idMedicament");
            $req -> bindValue(':idMedecin',$MEDECIN->getidMedicin());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

public function getMedecins(){
    try{
        $req = $this->conn->prepare("SELECT * FROM medecin");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $medecins = array();
        foreach($result as $medecin){
            $medecins[] = new medecin($medecin['idMedecin'], $medecin['nom'], $medecin['prenom'], $medecin['adresse'], $medecin['CP'], $medecin['tel'], $medecin['spécialitéComplémentaire'], $medecin['département']);
        }
        return $medecins;
    } catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
}