<?php

session_start();

if(!array_key_exists('mail', $_SESSION) OR empty($_SESSION['mail'])){
		$_SESSION['mail'] = "exemple@mail.fr";
	}
?>
<head>
  <link rel="stylesheet" type="text/css" href="../wampthemes/modern/style.css">
</head>
<div class="main-connexion">
<form action="traitement.php" method="post">
  <label for="POST-mail">Identifiant:</label><!--Mêtre en gris Mail dans la case de saisie-->
  <input id="POST-mail" type="mail" name="email" <?php echo 'value="'.$_SESSION['mail'].'"'?> required><br/>
	 <label for="POST-mdp">Mot de passe:</label>
  <input id="POST-mdp" type="text" name="mdp" placeholder="******" required><br/>
  <input class="connexion" type="submit" value="Connexion">
</form>

</div>