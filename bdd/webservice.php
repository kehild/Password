<?php

class Webservice{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
   
    public function SaisieMdp($db,$nom,$login,$mdp){
		
		try {	
						
			$sql = "Insert INTO password (nom, login, mdp) VALUES ('$nom','$login','$mdp')";
			$db->exec($sql);
			echo "Insertion réussi";

			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  } 
  
  
  public function ListeMdp($db){ // Pagination
  
      echo '<div class="pagination">';
        $messagesParPage=15;
        $retour_total=$db->prepare('SELECT COUNT(*) AS total FROM password');
        $retour_total->execute();
        $donnees_total=$retour_total->fetch(); 
        $total=$donnees_total['total'];
        $nombreDePages=ceil($total/$messagesParPage);

        if(isset($_GET['page'])){ 

             $pageActuelle=intval($_GET['page']);

             if($pageActuelle>$nombreDePages){

                 $pageActuelle=$nombreDePages;
             }
        } else{
             $pageActuelle=1;
        }

        $premiereEntree=($pageActuelle-1)*$messagesParPage; 

        $retour_messages=$db->prepare("SELECT * FROM password ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
        $retour_messages->execute();

                        echo "<table id='dernier' align='center'>";

                        echo "<tr><th>"; echo "Nom"; echo "</th>";
                        echo "<th>"; echo "Mdp complete"; echo "</th>";
                        echo "<th>"; echo "Supprimer"; echo "</th></tr>";

                        while($donnees_messages=$retour_messages->fetch()){ 

                        echo "<tr><th>"; echo stripslashes($donnees_messages['nom']); echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="mdpcomplete.php?id='.$donnees_messages['id'].'"><img src="images/porte.png"></a>'); echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="?id1='.$donnees_messages['id'].'"><img src="images/delete.png"></a>'); echo "</th></tr>";

                }
                        echo "</table>";

        echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages

        for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

             //On va faire notre condition
             if($i==$pageActuelle){ //Si il s'agit de la page actuelle...

                 echo ' [ '.$i.' ] '; 
             }	
             else{
                         echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
             }
        }
        echo '</p>';
 echo '</div>';	

}


 
public function search($db){

		if(isset($_POST['search'])) {
			$chainesearch = addslashes($_POST['search']);  
		try{
		
			$db->exec("SET CHARACTER SET utf8");
	
		}
		catch(PDOException $e){
			echo 'Erreur : '.$e->getMessage();
			echo 'N° : '.$e->getCode();
		}      
		
		$requete = "SELECT * from password WHERE nom LIKE '%". $chainesearch ."%'"; 					
		$resultat = $db->query($requete) or die(print_r($db->errorInfo()));
		$nb = 0;
							
		echo "<table id='dernier' align='center'>";
							
                echo "<tr><th>"; echo "Nom"; echo "</th>";
                echo "<th>"; echo "Mdp complete"; echo "</th>";
              //  echo "<th>"; echo "Modifier"; echo "</th>";
                 echo "<th>"; echo "Supprimer"; echo "</th></tr>";
							
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
																	
		echo "<tr><th>"; echo $donnees['nom']; echo "</th>";
		echo "<th>"; echo stripslashes('<a href="ModifLivre.php?id='.$donnees['id'].'"><img src="images/porte.png"></a>'); echo "</th>";
		//echo "<th>"; echo '<a href="ModifLivre.php?id='.$donnees['id'].'"><img src="images/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo stripslashes('<a href="?id1='.$donnees['id'].'"><img src="images/delete.png"></a>'); echo "</th></tr>"; echo "</th></tr>"; 
								
		$nb = $nb + 1;
		}
		echo "</table>";
		echo "</br>";
		echo "Il y a : ".$nb . " résultats";	
				

	} 
}

public function DeleteMdp($db){

	try {
	
		$stm = $db->prepare("delete from password where id='".$_GET['id1']."'"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		
	}
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}


  
   public function setDb(PDO $db){
    $this->_db = $db;
  }
}