<?php
include_once "bdd/connexion.php";
include_once "bdd/webservice.php";
?>

<header>
	<meta charset="UTF-8">
	<title>Gestion Password</title>
	<link rel="stylesheet" type="text/css" media="screen" href="style.css">
	<link rel="icon" type="image/png" href="images/cle.png"/>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<table id="test">	
		<tr>
			<td><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; &nbsp </span></td>
			<td><img src="images/icone.png" onclick="Home()"/> </td> <!--<img src="image/Cuilieres.png" onclick="Compte()"/> -->
			<td><h1>Gestion Password</h1></td>
                        <td> <form action="search.php" method="post">
                                <span>Recherche</span> 
                                <input type="text" id="search" name="search"/>
                            </form>
                        </td>
		</tr>
	</table>
</header>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="index.php">Home</a>
	<a href="saisie.php">Saisie Password</a>
	<a href="ParamPasswd.php">Générateur Password</a>
</div>

<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
        function Home(){
	var url = "index.php";			  
	 document.location.href = url;
	}
</script>

