<?php
try
  {
    $bdd=new PDO('mysql:host=localhost;dbname=aolys_recrutement','root','');
  }
  catch(Exception $e)
  {
    die('<strong>Erreur détectée !!! </strong>' . $e->getMessage());
  }
?>