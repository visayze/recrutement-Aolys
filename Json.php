<?php
session_start();
require 'bdd.inc.php';

class TraitementJson
{
  private $_json;
  
  //Fonction qui permet la récupération d'un doc JSON
  public function RecupJson($url){

    $json = file_get_contents($url,0,null,null); //"php://input"
    $tmp = json_decode($json, true);
    return $tmp;//récuperation automaique
   //$requete=$bdd->prepare('INSERT INTO inscrit /*(id, mail_inscrit, mdp_inscrit )*/ VALUES (:id,:mail_inscrit,:mdp_inscrit )')or die (print_r($bdd->errorInfo()));//null auto génère
   // $requete->execute(/*array(
   //                           'id'=>$tmp['id'],
     //                         'mail_inscrit'=>$tmp['mail_inscrit'],
        //                      'mdp_inscrit'=>$tmp['mdp_inscrit']
      //                      )*/$tmp);
  
    }//$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
//print_r ($a);

  public function EnvoiJson($requete){

  //  $requete=$bdd->prepare('SELECT * FROM inscrit/*users WHERE mail_inscrit=? AND mdp_inscrit=?*/') or die (print_r($bdd->errorInfo()));
  //  $requete->execute(/*array($_POST['email'],$_POST['mdp'])*/);
    
    // fetch the results into an array
    $result = $requete->fetchAll( PDO/*bdd*/::FETCH_ASSOC );
    // convert to json
    $json = json_encode( $result );

    // echo the json string
    echo $json;

    $requete->closeCursor();

  }
}

$JsonFile = new Json;
$JsonFile->EnvoiJson($bdd);
$JsonFile->RecupJson("data.json");

?>