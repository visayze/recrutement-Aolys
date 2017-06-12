<?php
session_start();

try
  {
    $bdd=new PDO('mysql:host=localhost;dbname=aolys_recrutement','root','');
  }
  catch(Exception $e)
  {
    die('<strong>Erreur détectée !!! </strong>' . $e->getMessage());
  }


$email = $_POST['email'];
$mdp = $_POST['mdp'];


class Inscrit
{
	private $_email;
	private $_mdp;

	public function setEmail($email)
  {
    /*if (gettype($email) == 'string') // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Le mail n\'est pas du type String' , E_USER_WARNING);
      return;
    }*/
        
    $this->_email = $email;
  }
  	public function setMdp($mdp)
  {
    /*if (gettype($email) == 'string') // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Le mail n\'est pas du type String' , E_USER_WARNING);
      return;
    }*/
        
    $this->_mdp = $mdp;
  }
  	public function setlogin($bdd){
      $id="";
    $requete=$bdd->prepare('SELECT * FROM inscrit WHERE mail_inscrit=? AND mdp_inscrit=?') or die (print_r($bdd->errorInfo()));
    $requete->execute(array($_POST['email'],$_POST['mdp']));
    while ($data=$requete->fetch())
    {
      $id=$data['id'];
    }
    if ($id=="")
    {
      echo 'Erreur ! Votre identifiant ou votre mot de passe est mal saisi.';
    }else{
      $_SESSION['login'] = $_POST['email'];
      echo "Vous êtes connecté avec le mail suivant:",$_SESSION['login'];
    }
    $requete->closeCursor();
  }

    public function email()
  {
  	return $this->_email;
  }
     public function mdp()
  {
  	return $this->_mdp;
  }
  public function login()
  {
    return $_SESSION['login'];
  }
}

$Inscrit = new Inscrit;
$Inscrit->setEmail($email);
$Inscrit->setMdp($mdp);
$Inscrit->setlogin($bdd);
$Inscrit->login();
?>