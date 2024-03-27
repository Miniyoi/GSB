<?php
class MEDICAMENT{
    private $idMedicament;
    private $nomCommercial;
    private $Composition;
    private $effets;
    private $contreIndications;
    private $idFamille;

    public function __construct ($idMedicament,$nomCommercial,$Composition,$effets,$contreIndications,$idFamille){
        $this->idMedicament = $idMedicament;
        $this->nomCommercial = $nomCommercial;
        $this->Composition = $Composition;
        $this->effets = $effets;
        $this->contreIndications = $contreIndications;
        $this->idFamille = $idFamille;
    }
    //getters
    public function getidMedicament(){
        return $this->idMedicament;
    }
    public function getnomCommercial(){
        return $this->nomCommercial;
    }
    public function getComposition(){
        return $this->Composition;
    }
    public function geteffets(){
        return $this->effets;
    }
    public function getcontreIndications(){
        return $this->contreIndications;
    }
    public function getidFamille(){
        return $this->idFamille;
    }
    // setters
    public function setidMedicament($idMedicament){
        $this->idMedicament = $idMedicament;
    }
    public function setnomCommercial($nomCommercial){
        $this->nomCommercial = $nomCommercial;
    }
    public function setComposition($Composition){
        $this->Composition = $Composition;
    }
    public function seteffets($effets){
        $this->effets = $effets;
    }
    public function setcontreIndications($contreIndications){
        $this->contreIndications = $contreIndications;
    }
    public function setidFamille($idFamille){
        $this->idFamille = $idFamille;
    }
}