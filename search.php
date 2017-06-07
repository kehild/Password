<?php
include_once "header.php";
include_once "bdd/webservice.php";
include_once "bdd/connexion.php";
?>

<body>
	<section>
		<div class="transbox">
		<?php
		$web = new webservice($db);
		$web->search($db);
		
                if (isset($_GET['id1'])){
                    $web->DeleteMdp($db);
               } 
		?>					
		</div>		
	</section>		
</body>		
