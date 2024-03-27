<?php
include_once "modele/authentification.inc.php";
include_once "modele/visiteurDAO.php";
include_once "modele/visiteur.php";
include_once "modele/medecin.php";
include_once "modele/medecinDAO.php";
include_once "modele/rapport.php";
include_once "modele/rapportDAO.php";
include_once "modele/medicament.php";
include_once "modele/medicamentDAO.php";

//liste des mécedins
$dao=new MEDECINDAO();
    $MedecinDAO=$dao->getMedecins();
    foreach ($MedecinDAO as $m) {
        $listeMedecins[] = array(
        "id" => $m->getidMedecin(),
        "nom" => $m->getNom(),
        "prenom" => $m->getPrenom(),
        "adresse" => $m->getAdresse(),
        "tel" => $m->getTel(),
        "specialite" => $m->getspecialiteComplementaire(),
        "coefDepartement" => $m->getdépartement()
    );
}

//liste des médicaments
$dao=new MedicamentDAO();
    $MedicamentDAO=$dao->getMedicaments();
    foreach ($MedicamentDAO as $m) {
        $listeMedicaments[] = array(
        "id" => $m->getidMedicament(),
        "nomCommercial" => $m->getNomCommercial(),
        "composition" => $m->getComposition(),
        "effets" => $m->getEffets(),
        "contreIndications" => $m->getContreIndications(),
        "idFamille" => $m->getidFamille()
    );
}

include "Vue/nouveauRapport.html.php";

if (isset($_POST["dateVisite"]) && isset($_POST["medecin"]) && isset($_POST["motif"]) && isset($_POST["bilan"])){
    $dao=new RapportDAO();
    $id = $dao->getSmallIdRapport();
    $dateVisite = $_POST["dateVisite"];
    $medecin = $_POST["medecin"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];

    $rapport = new RAPPORT($idRapport, $dates, $motif, $bilan, $_SESSION["id"], /*Id medecin*/);
    $dao->ajoutRapport($rapport);

    header("Location: ./?action=monProfil");
}
