<?php
session_start();
require 'bdd.inc.php';
require 'Json.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PACH, PUT, DELETE, OPTIONS");
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin, X-Autch-Token");


$Inscrit = new Inscrit;
$Inscrit->setlogin($bdd);

class Inscrit
{
  	public function setlogin($bdd){
        $tmppp = TraitementJson::RecupJson("php://input");
        $id="";
        $requete=$bdd->prepare('SELECT id FROM inscrit WHERE mail_inscrit= :mail AND mdp_inscrit= :mdp') or die (print_r($bdd->errorInfo()));
        
        if($tmppp){
            $requete->execute($tmppp);
        }
        
        while ($data=$requete->fetch())
        {
           $id=$data["id"];         

        }
        
        if($id!==""){
            $requete->execute($tmppp);
            echo TraitementJson::EnvoiJson($requete);
        }
        
    $requete->closeCursor();
    }
}
?>