<?php
require_once('verif_session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>GPS de l'orientation Henri Wallon</title>
		<link rel="stylesheet" href="style/template.css" />
		<script src="jquery.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="ombre">
<?php
			include('Vue/header.php');
			
?>
			<section id="content" >
				<article class="container">
<?php

					include("case.php");
				
?>
				</article>
			</section>
<?php
					

			include('Vue/footer.php');
?>
		</div>
	</body>
</html>