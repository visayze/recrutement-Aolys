<?php


require 'bdd.inc.php';
require 'Json.php';

/*
$email = $_POST['email'];
$mdp = $_POST['mdp'];*/
$_SESSION['login']= "";


class Inscrit
{
	private $_email;
	private $_mdp;

	//permet de modifier la valeur de $_email de la classe Inscrit
    public function setEmail($email)
  {
    
    if (gettype($email) == 'string') // S'il ne s'agit pas d'un string.
    {
      trigger_error('Le mail n\'est pas du type String' , E_USER_WARNING);
      return;
    }
        
    $this->_email = $email;
  }
    //permet de modifier la valeur de $_mdp de la classe Inscrit
  	public function setMdp($mdp)
  {
    if (gettype($mdp) == 'string') // Test si c'est une chaine de caractère(sting).
    {
      trigger_error('Le mot de passe n\'est pas du type String' , E_USER_WARNING);
      return;
    }
        
    $this->_mdp = $mdp;
  }
  	public function setlogin($bdd){
        $tmp = TraitementJson::RecupJson(/*"data.json"*/);
        print_r($tmp);
      $id="";
    $requete=$bdd->prepare('SELECT id FROM inscrit WHERE mail_inscrit= :mail_inscrit AND mdp_inscrit= :mdp_inscrit') or die (print_r($bdd->errorInfo()));
        if($tmp){
    $requete->execute($tmp);
        }
    while ($data=$requete->fetch())
    {
      $id=$data['id'];
        echo TraitementJson::EnvoiJson($requete);
    }
    if ($id=="")
    {
      echo 'Erreur ! Votre email ou votre mot de passe est mal saisi.';
    }else{
      $_SESSION['id'] = $id;
      echo "Vous êtes connecté avec l'id suivant:",$_SESSION['id'];
    }
        
    $requete->closeCursor();
  }
    //permet de retourner email
    public function email()
  {
  	return $this->_email;
  }
    //permet de retourner mdp
     public function mdp()
  {
  	return $this->_mdp;
  }
    //permet de retourner la valeur de login
  public function login()
  {
    return $_SESSION['login'];
  }
}

$Inscrit = new Inscrit;
/*$Inscrit->setEmail($email);
$Inscrit->setMdp($mdp);*/
$Inscrit->setlogin($bdd);
//$Inscrit->login();



?>

