<?php 
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/webservice.php";

if (isset($_POST['Valider'])) {
	$livre = new webservice($db);
	$livre->SaisieMdp($db,$_POST['nom'],$_POST['login'],$_POST['mdp']);	
}

?>

<div>
</br>
  <form id="saisieForm" method="post" action="">
    </br></br></br>
	<label for="nom">Nom</label>
    </br></br></br>
	<input type="text" id="nom" name="nom">
	</br></br>
	<label for="login">Login / Mail</label>
    </br></br></br>
	<input type="text" id="login" name="login">
	</br></br>
	<label for="mdp">Mot de Passe</label>
    </br></br>
	<input type="text" id="mdp" name="mdp">
	</br></br></br>
    <input type="submit" name="Valider" value="Valider">
	</br></br>
  </form>
</div>