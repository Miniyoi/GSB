<?php
class RAPPORT{
    private  $idRapport;
    private  $dates;
    private  $motif;
    private  $bilan;
    
    public function __construct ($idRapport,$dates,$motif,$bilan){
        $this->idRapport = $idRapport;
        $this->dates = $dates;
        $this ->motif = $motif;
        $this ->bilan = $bilan;    
    }
    public function getidRapport(){
        return $this->idRapport;
    }
    public function getdates(){
        return $this->dates;
    }
    public function getmotif(){
        return $this->motif;
    }
    public function getbilan(){
        return $this->bilan;
    }
    public function setidRapport($idRapport){
        $this->idRapport = $idRapport;
    }
    public function setdates($dates){
        $this->dates = $dates;
    }
    public function setmotif($motif){
        $this->motif = $motif;
    }
    public function setbilan($bilan){
        $this->bilan = $bilan;
    }
}