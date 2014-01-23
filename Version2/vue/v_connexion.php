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