<?php
	require_once('include/fonction.php');
?>
<footer id="footer">
	<div class="top_line" >
		<div class="divfooter">
			<form action="." method="POST">
				<input type ="submit" id="contact" name="contact" value="Contact"/>
				<input type="hidden" name="page" value="contact"/>
			</form>
		</div>			
		<?php
			if($_SESSION['connexionOK'] == TRUE)
			{
		?>
				<div class="divfooter">
					<form action="." method="POST">
						<input type ="submit" id="deconnexion" name="deconnexion" value="Deconnexion"/>
						<input type="hidden" name="page" value="deconnexion"/>
					</form>
				</div>
		<?php	
			}
			if($_SESSION['connexionOK'] == FALSE)
			{
		?>	
				<div class="divfooter">
					<form action="." method="POST">
						<input type ="submit" id="connexion" name="connexion" value="Connexion"/>
						<input type="hidden" name="page" value="connexion"/>
					</form>
				</div>
		<?php
			}
		?>
	
	</div>
	<div class="base_line">
	</div>

</footer>