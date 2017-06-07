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
                            $web->ListeMdp($db);
                            
                        if (isset($_GET['id1'])){
                            $web->DeleteMdp($db);
                        } 
			?>
			</div>
		</div>
	</section>
</body>