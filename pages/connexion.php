<?php //if(isset($_SESSION["login"]) AND isset($_SESSION["mdp"])){
   
  // echo "<p>Bienvenue <strong>".$_SESSION["login"]."</strong></p>";
   
//} ?>

<?php //if($error == TRUE){ echo "<p><strong>".$errorMSG."</strong></p>"; } ?>

<?php //if($_SESSION['connexionOK'] == TRUE){ echo "<p><strong>".$connexionMSG."</strong></p>"; } ?>


      <h2>Connexion au site</h2>

	<form action="" method="POST">
		<table>	
			<tr>
				<td>
					<label for="login">Identifiant : </label>
				</td>
				<td>	
					<input type="text" id="login" name="login" class="login" />
				</td>
			</tr>
			<tr>
				<td>
				<label for="mdp">Mot de passe : </label>
				</td>
				<td>
				<input type="password" id="mdp" name="mdp" class="mdp" />
				</td>
			</tr>
			<tr>	
				<td>
				<input type="submit" value="Valider" name="validConnexion" id="connex" class="connex"/>
				<input type="hidden" name="page" value="validConnexion" class="connex"/>
				</td>
			
			</tr>
		</table>
	</form>
<script>
			jQuery('#connex').click(function()
			{
				var loginvalue = $('#login').val();
				var mdpvalue = $('#mdp').val();
				var verif = true;
				if(loginvalue.length==0 || mdpvalue.length==0)
				{
					alert('vous n\'avez pas rempli bla bla');
					verif = false;
				}
				return verif ;
			});
			
	</script>