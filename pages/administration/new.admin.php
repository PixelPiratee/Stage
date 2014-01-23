<?php
if(in_array('utilisateur::new', $_SESSION['droits']))
{
	global $connectionBDD ;
?>

	<div id="action_container">
	
	<!--
	 * Entete du module
	 *-->
		<div id="action_header">
			<h3>Nouvel Utilisateur</h3>
		</div>
	
	<!--
	 * Corps du module
	 *-->

		<div id="action_body">
<?php
		if(isset($_POST['btn_enregistrer']))
		{
			/**
			* Enregistrement de l'Utilisateur
			*/
		 

			$sql  = "INSERT INTO utilisateur VALUES"."\r\n";
			$sql .= "(null, :login,:mdp,:nom,:prenom,:add_mail);";
		
				
			$requete = $connectionBDD->prepare($sql);
			$requete->bindParam(':login',$_POST['login']);
			$requete->bindParam(':mdp',$_POST['mdp']);
			$requete->bindParam(':nom',$_POST['nom']);
			$requete->bindParam(':prenom',$_POST['prenom']);
			$requete->bindParam(':add_mail',$_POST['add_mail']);

		
			$result = $requete->execute();
		
				if($result)
				{
?>
					<p>Enregistrement effectué.</p>
<?php
				}
				else
				{
?>
					<p>Une erreur est survenue lors de l'enregistrement.</p>
					<pre> <?print_r($requete->errorInfo(),true)?> </pre>
<?php
				}
		
		}
		else
		{
		
		/**
		 * Formulaire d'enregistrement de l'Utilisateur
		 */


?>
			<form name="edit" id="edit" action=".?gestion=utilisateur&amp;action=new" method="post" onSubmit="return valid();">
				<table>
				
					<tr>
						<td><label for="login">Identifiant : </label></td>
						<td><input type="text" id="login" name="login" maxlength="20" tabindex="1" /></td>
					</tr>

					<tr>
						<td><label for="prenom">Mot de Passe : </label></td>
						<td><input type="password" id="password" name="password" maxlength="200" tabindex="2" /></td>'
					</tr>
		
					<tr>
						<td><label for="prenom">Ressaisir Mot de Passe : </label></td>
						<td><input type="password" id="password2" name="password2" maxlength="200" tabindex="3" /></td>
					</tr>

					<tr>
						<td><label for="prenom">Prénom : </label></td>
						<td><input id="prenom" name="prenom" maxlength="20" tabindex="4" /></td>
					</tr>
		
					<tr>
						<td><label for="nom">Nom : </label></td>
						<td><input id="nom" name="nom" maxlength="20" tabindex="5" /></td>
					</tr>

					<tr>
						<td><label for="add_mail">Email : </label></td>
						<td><input id="add_mail" name="add_mail" maxlength="250" value="" size="30" tabindex="6" /></td>
					</tr>
		
				</table>
		
				<input type="submit" name="btn_enregistrer" value="Enregistrer" tabindex="7" />	
					
			</form>		
<?php
	}
?>	
		</div>
	
	<!--
	 * Bas de page du module
	 *-->
	 
		<div id="action_footer">
	
	<!--
	 * Bouton Retour
	*-->
	
			<form id="retour" name="retour" action=".?gestion=utilisateur" method="post">
				<input type="submit" name="btn_retour" value="Retour à la liste" />	
			</form>
		</div>
	
	</div>
<?php
}
else
{
?>
	<p>Accès Interdit</p>	
<?php	
}
?>