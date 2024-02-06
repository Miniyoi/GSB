<?php
class MEDICAMENT{
    private $idMedicament;
    private $nomCommercial;
    private $Composition;
    private $effets;
    private $contreIndications;

    public function __construct ($idMedicament,$nomCommercial,$Composition,$effets,$contreIndications){
        $this->idMedicament = $idMedicament;
        $this->nomCommercial = $nomCommercial;
        $this->Composition = $Composition;
        $this->effets = $effets;
        $this->contreIndications = $contreIndications;
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
}