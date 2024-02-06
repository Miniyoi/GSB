<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["Connexion"] = "connexion.php";
    $lesActions["Inscription"] = "inscription.php";
    if (array_key_exists($action, $lesActions)){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

$action = $_GET['action'] ?? 'defaut'; //action par défaut

$nomControleur = controleurPrincipal($action);
if ($nomControleur !== null && file_exists($nomControleur)){
    include($nomControleur);
}else{
    echo "Action non reconnue ou contrôleur manquant.";
}

?>