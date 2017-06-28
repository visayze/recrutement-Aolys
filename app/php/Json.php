<?php

class TraitementJson
{
  private $_json;
  
  //Fonction qui permet la récupération d'un doc JSON
  public static function RecupJson($url){

    $json = file_get_contents($url); //$url,0,null,null
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

  public static function EnvoiJson($requete){
    // fetch the results into an array
    $result = $requete->fetchAll( PDO/*bdd*/::FETCH_ASSOC );
    // convert to json
      //print_r($result);
      
    
      
    // echo the json string
      return json_encode( $result );
      
    $requete->closeCursor();
  }
}
/*
$JsonFile = new TraitementJson;
$JsonFile->EnvoiJson($bdd);
$JsonFile->RecupJson("data.json");
*/
?>