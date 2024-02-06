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
    if (isset ($_SESSION["login"])) {
        session_start();
    }
    $ret = false;
    
    if (isset($_SESSION["login"])) {
        $VisiteurDAO = new VisiteurDAO();
        $Visit = $VisiteurDAO->getVisiteurByLogin($_SESSION["login"]);
        if ($Visit->getlogins()==$_SESSION["login"] && $Visit->getmdp()==$_SESSION["mdp"]) {
            $ret = true;
        }
    }
    return $ret;
}
