<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/webservice.php";
?>

<body>
	<section>
		<div class="section">
			<div class="transbox">
                        <?php
                            $web = new webservice($db);
                            $web->MdpComplete($db);
                            
                           
                            if(isset($_POST['Annuler'])){
                                echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                            }
                            
                            if(isset($_POST['Modifier'])){
                                $web->UpdateMdp($db);
                          
                            }
			?>
			</div>
		</div>
	</section>
</body>
