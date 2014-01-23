<?php
	require_once('scripts/verif_session.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>GPS de l'orientation Henri Wallon</title>
		<link rel="stylesheet" href="style/template.css" />
		<script src="scripts/jquery.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="ombre">
			<?php
				include('vue/v_header.php');				
			?>
				<section id="content" >
					<article class="container">
					<?php
						include("scripts/case.php");
					?>
					</article>
				</section>
			<?php
				include('vue/v_footer.php');
			?>
		</div>
	</body>
</html>