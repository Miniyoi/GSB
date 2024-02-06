<?php

include_once "modele/authentification.inc.php";
include_once "modele/visiteurDAO.php";
include_once "modele/visiteur.php";

$dao = new VISITEURDAO();
$VisiteurDAO = $dao->getVisiteurs();
    foreach ($VisiteurDAO as $v) {
        $listeVisiteurs[] = array(
            "login" => $v->getlogins(),
            "mdp" => $v->getmdp()
        );
}

ob_start();

if(isLoggedOn()) {
    include "Vue/MonProfil.html.php";
} else {
    include "Vue/Inscription.html.php";
}

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['logins']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['CP']) && isset ($_POST['ville']) && isset($_POST['dateEmbauche'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $logins = $_POST['logins'];
    $mdp = $_POST['mdp'];
    $adresse = $_POST['adresse'];
    $CP = $_POST['CP'];
    $ville = $_POST['ville'];
    $dateEmbauche = $_POST['dateEmbauche'];

    $visiteur= new Visiteur($id, $nom, $prenom, $login, $mdp, $adresse, $CP, $ville, $dateEmbauche);
    $dao->ajout($visiteur);
    
    if(isLoggedOn()) {
        include "Vue/MonProfil.html.php";
    } else {
        include "Vue/Inscription.html.php";
    }
}
ob_end_flush();