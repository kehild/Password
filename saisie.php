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
	</br></br>
    <label for="categorie">Catégorie</label>
    	</br></br>
	<select name="categorie" id="categorie">
			<option value="Ville">Ville</option>
                        <option value="Region">Region</option>
			<option value="Symbole">Symbole</option>
			<option value="Monument">Monument</option>
			<option value="Pays">Pays</option>
	</select>
	</br></br></br>
    <input type="submit" name="Valider" value="Valider">
	</br></br>
  </form>
</div>