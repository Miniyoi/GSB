<?php
class RAPPORTDAO {
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function ajoutRapport($RAPPORT){
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

    public function updateRapport($RAPPORT){
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

    public function deleteRapport($RAPPORT){
        try{
            $req = $this->conn->prepare("DELETE FROM RAPPORT WHERE idRapport=:idRapport");
            $req -> bindValue(':idRapport',$RAPPORT->getidRapport());
            $req->execute();
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    public function getRapports(){
        try{
            $req = $this->conn->prepare("SELECT * FROM rapport");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $rapports = array();
            foreach($result as $rapport){
                $rapports[] = new Rapport($rapport['idRapport'], $rapport['dateRapport'], $rapport['motif'], $rapport['bilan'], $rapport['visiteur'], $rapport['medecin']);
            }
            return $rapports;
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    public function getSmallIdRapport(){
        try{
            $req = $this->conn->prepare("SELECT MIN(r.IdRapport + 1)
                                        FROM Rapport r 
                                        LEFT JOIN Rapport r_next   
                                        ON r.IdRapport + 1 = r_next.IdRapport 
                                        WHERE r_next.IdRapport IS NULL LIMIT 1");
            $req->execute();
                
            return $req->fetch(PDO::FETCH_ASSOC)["MIN(r.IdRapport + 1)"];
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}