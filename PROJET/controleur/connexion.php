<?php

include_once("modele/visiteur.php");
include_once("modele/authentification.inc.php");
include_once("modele/visiteurDAO.php");

$dao=new VISITEURDAO();
    $VisiteurDAO=$dao->getVisiteurs();
    foreach ($VisiteurDAO as $v){
    $listeVisiteurs[] = array(
    "login" => $v->getlogins(),
    "mdp" => $v->getmdp()
    );
}

if(isset($_POST['login'])&&isset($_POST['mdp'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
}else{
    $login = "";
    $mdp = "";
}
login($login, $mdp);

if(isLoggedOn()){
    include "Vue/MonProfil.html.php";
}else{
    include "Vue/Connexion.html.php";
}