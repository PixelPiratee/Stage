<?php
if(in_array('utilisateur::edit', $_SESSION['droits']))
{
	global $connectionBDD ;
?>

	<div id="action_container">
	
	<!--*
	 * Entete du module
	 *-->
		<div id="action_header">
			<h3>Edition d'un Utilisateur</h3>
		</div>
	
	<!--*
	 * Corps du module
	 *-->

		<div id="action_body">
<?php
	if(isset($_POST['btn_enregistrer']))
	{
		/**
		 * Enregistrement de l'Utilisateur
		 */

		$sql  = "UPDATE utilisateur SET"."\r\n";
		$sql .= "login=:login,"."\r\n";
		$sql .= "mdp=:mdp,"."\r\n";
		$sql .= "nom=:nom,"."\r\n";
		$sql .= "prenom=:prenom,"."\r\n";
		$sql .= "add_mail=:add_mail"."\r\n";
		$sql .= "WHERE id=:id;";
		

		$requete = $connectionBDD->prepare($sql);
		$requete->bindParam(':login',$_POST['login']);
		$requete->bindParam(':mdp',$crypted_pwd);
		$requete->bindParam(':nom',$_POST['nom']);
		$requete->bindParam(':prenom',$_POST['prenom']);
		$requete->bindParam(':add_mail',$_POST['add_mail']);
		$requete->bindParam(':id',$_POST['id']);
		
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
			<pre><?print_r($requete->errorInfo(),true)?></pre>
<?php
		}
		
	}
	else
	{
		/**
		 * chargement des informations de l'Utilisateur
		 */


		$sql  = "SELECT * from utilisateur WHERE id=:id;";
		
		$requete = $connectionBDD->prepare($sql);
		$requete->bindParam(':id',$_POST['id']);
		$requete->execute();
		$resultat = $requete->fetch(PDO::FETCH_ASSOC);
		
		if($resultat)
		{
			/**
			 * Edition de l'Utilisateur
			 */
?>

			
			<form name="edit" id="edit" action=".?gestion=utilisateur&amp;action=edit" method="post" onSubmit="return valid();">
				<table>
			
					<tr>
						<td><label for="login">Identifiant : </label></td>
						<td><input type="text" id="login" name="login" maxlength="20" value="'.$resultat['login'].'" tabindex="1" /></td>
					</tr>

					<tr>
						<td><label for="prenom">Mot de Passe : </label></td>
						<td><input type="password" id="mdp" name="mdp" maxlength="200" tabindex="2" /></td>
					</tr>
			
					<tr>
						<td><label for="prenom">Ressaisir Mot de Passe : </label></td>
						<td><input type="password" id="mdp2" name="mdp2" maxlength="200" tabindex="3" /></td>
					</tr>

					<tr>
						<td><label for="prenom">Prénom : </label></td>
						<td><input id="prenom" name="prenom" maxlength="20" value="'.$resultat['prenom'].'" tabindex="4" /></td>
					</tr>
			
					<tr>
						<td><label for="nom">Nom : </label></td>
						<td><input id="nom" name="nom" maxlength="20" value="'.$resultat['nom'].'" tabindex="5" /></td>
					</tr>

					<tr>
						<td><label for="add_mail">Email : </label></td>
						<td><input id="add_mail" name="add_mail" maxlength="250" size="30" value="'.$resultat['add_mail'].'" tabindex="6" /></td>
					</tr>
			
				</table>
			
			
				<input type="hidden" id="id" name="id" value="'.$resultat['id'].'" />
				<input type="hidden" id="validation" name="validation" value="'.$resultat['validation'].'" />
				<input type="submit" name="btn_enregistrer" value="Enregistrer" />	
						
			</form>		
<?php
		}
		else
		{
?>
			<p>Utilisateur inconnu.</p>
<?php
		}

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