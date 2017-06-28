<?php
session_start();

require 'bdd.inc.php';

  $id_annonce = "";
  $id_annonce = $_POST['id_annonce'];
  public function affListeEmploi($bdd)
  {
    $requete=$bdd->prepare('SELECT * FROM annonce_has_inscrit WHERE annonce_id_annonce=?') or die (print_r($bdd->errorInfo()));
    $requete->execute(array($id_annonce));//Le array est il necessaire a tester.
    while ($data=$requete->fetch())
    {
      $id=$data['id'];
    }
    if ($id=="")
    {
      echo 'Erreur ! Aucune annonce ne possède cette id.';
    }else{

    echo Json::EnvoiJson($requete);
    }
    $requete->closeCursor();
  }

  //fonction permetant de suprimer une offre d'emploi
    $id_annonce = "";
    $id_annonce = $_POST['id_annonce'];
  public function suppEmploi($bdd)
  {
    $requete=$bdd->prepare('DELETE from annonce WHERE id_annonce=?') or die (print_r($bdd->errorInfo()));
    $requete->execute(array($id_annonce));//Le array est-il necessaire à tester.
    while ($data=$requete->fetch())
    {
      $id=$data['id'];
    }
    if ($id=="")
    {
      echo 'Erreur ! Aucune annonce ne possède cette id. Supression impossible !';
    }else{
    return;
    }
    $requete->closeCursor();
  }

  //fonction permetant de modifier une offre d'emploi
  //NE FONCTIONNE PAS
    $id_annonce = "";
    $id_annonce = $_POST['id_annonce'];
  public function editEmploi($bdd)
  {
    $requete=$bdd->prepare('UPDATE annonce SET titre_annonce_emploi, description_empploi, type_annonce, catégorie_annonce WHERE id_annonce=?') or die (print_r($bdd->errorInfo()));
    $requete->execute(array($id_annonce));//Le array est-il necessaire à tester.
    while ($data=$requete->fetch())
    {
      $id=$data['id'];
    }
    if ($id=="")
    {
      echo 'Erreur ! Aucune annonce ne possède cette id. Supression impossible !';
    }else{
    return;
    }
    $requete->closeCursor();
  }
  //fonction permetant l'ajout d'offre d'emplois / fabrique de talents
   public function addEmploi($url,$bdd){
    $json = file_get_contents($url,0,null,null); 
    $tmp = json_decode($json, true);

   $requete=$bdd->prepare('INSERT INTO inscrit /*(id, mail_inscrit, mdp_inscrit )*/ VALUES (:id,:mail_inscrit,:mdp_inscrit )')or die (print_r($bdd->errorInfo()));//null auto génère
    $requete->execute(/*array(
                              'id'=>$tmp['id'],
                              'mail_inscrit'=>$tmp['mail_inscrit'],
                              'mdp_inscrit'=>$tmp['mdp_inscrit']
                            )*/$tmp);
  
    }
?>