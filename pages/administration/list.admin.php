<?php
if(in_array('utilisateur::list', $_SESSION['droits']))
{
	global $connectionBDD ;
?>
	<div id="action_container">
		<div id="action_header">
			<h3>Liste des Utilisateurs</h3>
		</div>
	
		<div id="action_body">

<?php
	if(in_array('utilisateur::new', $_SESSION['droits']))
	{
?>
		<form  action="" method="get">
			<input type="submit" name="btn_nouveau" value="Nouveau" />
			<input type="hidden" name="action" value="new" />
		</form>
		
		<!--<form id="nouveau" name="nouveau" action=".?gestion=administration&amp;action=new" method="post">
				<input type="submit" name="btn_nouveau" value="Nouveau" />
				</form>-->
<?php		
	}
	
	/**
	 * Chargement de la liste des utilisateurs
	 */
	$sql = "SELECT * FROM utilisateur;";
	$resultat = $connectionBDD->query("SELECT * FROM utilisateur;");
	
	if($resultat->rowCount())
	{
?>
		<table>
<?php
		foreach($resultat as $ligne)
		{
?>
			<tr>
			
			<td><?php echo $ligne['login']; ?></td>
			<td><?php echo $ligne['id']; ?></td>
			
		 <!--*
			 * Bouton Editer
			 *-->
			<td>
<?php
			if(in_array('utilisateur::edit', $_SESSION['droits']))
			{
?>
				
		
				<form id="editer_<?php echo $ligne['id'] ?>" name="editer_<?php echo $ligne['id'] ?>" action=".?gestion=utilisateur&amp;action=edit" method="post">
					<input type="hidden" name="id" value="<?php echo $ligne['id'] ;?>" />	
					<input type="submit" name="btn_editer" value="Editer" />
				</form> 
<?php
			}
?>
			</td>
			
		 <!--*
			 * Bouton Supprimer
			 *-->
			
			<td>
<?php
			if(in_array('utilisateur::delete', $_SESSION['droits']))
			{
?>
				<form id="supprimer_<?php echo $ligne['id'] ?>" name="supprimer_<?php echo $ligne['id'] ?>" action=".?gestion=utilisateur&amp;action=delete" method="post">
					<input type="hidden" name="id" value="<?php echo $ligne['id'] ;?>" />	
					<input type="submit" name="btn_supprimer" value="Supprimer" />	
				</form>
<?php		
			}
?>
			</td>
			
			</tr>
<?php
		}
?>
		</table>
<?php
	}
	else
	{
?>
		<p>Il n'y aucun utilisateur enregistré.</p>
<?php
	}
?>
	</div>
	
 <!--*
	 * Bas de page du module
	 *-->
	<div id="action_footer">
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