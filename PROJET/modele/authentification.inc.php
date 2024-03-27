<?php
include_once 'connexionPDO.php';
include_once 'visiteurDAO.php';

function login($login,$mdp){
        if(!isset ($_SESSION)) {
            session_start();
        }
        $visiteurDAO = new visiteurDAO();
        $visit=$visiteurDAO->getvisiteurByLogin($login);
        if($visit){
            $mdpBD = $visit->getmdp();//IMPOSSIBLE DE TROUVER LE MDP DU VISITEUR

            if(trim($mdpBD) == trim($mdp)) {
                //le mdp est celui de l'user dans la bd
                $_SESSION["login"] = $login;
                $_SESSION["mdp"] = $mdp;
            }
        }   
}

function logout()  {
    if(!isset ($_SESSION)) {
        session_start();
    }
        unset ($_SESSION["login"]);
        unset ($_SESSION["mdp"]);
}

function getLoggedOn(){
    if (isLoggedOn()) {
        $ret = $_SESSION["login"];
    }else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn(){
    $ret = false;
    
    if (isset($_SESSION["login"])) {
        $VisiteurDAO = new VisiteurDAO();
        $Visiteur = $VisiteurDAO->getVisiteurByLogin($_SESSION["login"]);
        if ($Visiteur !=null && $Visiteur->getlogins()==$_SESSION["login"] && $Visiteur->getmdp()==$_SESSION["mdp"]) {
            $ret = true;
        }
    }
    return $ret;
}
