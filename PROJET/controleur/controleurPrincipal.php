<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["Connexion"] = "connexion.php";
    $lesActions["Deconnexion"]= "deconnexion.php";
    $lesActions["Inscription"] = "inscription.php";
    $lesActions["nouveauRapport"] = "nouveauRapport.php";
    

    if (array_key_exists($action, $lesActions)){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

$action = $_GET['action'] ?? 'defaut'; //action par défaut


