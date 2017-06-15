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
$_SESSION['login']= "";


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


class Json
{
  private $_json;

  public function RecupJson($url){

try
  {
    $bdd=new PDO('mysql:host=localhost;dbname=aolys_recrutement','root','');
  }
  catch(Exception $e)
  {
    die('<strong>Erreur détectée !!! </strong>' . $e->getMessage());
  }


    $json = file_get_contents($url,0,null,null); 
    $tmp = json_decode($json, true);

   $requete=$bdd->prepare('INSERT INTO inscrit /*(id, mail_inscrit, mdp_inscrit )*/ VALUES (:id,:mail_inscrit,:mdp_inscrit )')or die (print_r($bdd->errorInfo()));//null auto génère
    $requete->execute(/*array(
                              'id'=>$tmp['id'],
                              'mail_inscrit'=>$tmp['mail_inscrit'],
                              'mdp_inscrit'=>$tmp['mdp_inscrit']
                            )*/$tmp);
  
    }//$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
//print_r ($a);

  public function EnvoiJson($bdd){

    $requete=$bdd->prepare('SELECT * FROM inscrit/*users WHERE mail_inscrit=? AND mdp_inscrit=?*/') or die (print_r($bdd->errorInfo()));
    $requete->execute(/*array($_POST['email'],$_POST['mdp'])*/);
    
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

