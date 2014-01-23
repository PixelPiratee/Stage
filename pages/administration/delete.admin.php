<?php
	if(in_array('utilisateur::delete', $_SESSION['droits']))
	{
	global $connectionBDD;
?>
		<div id="action_container">
		
		<!--
		 * Entete du module
		 *-->
			<div id="action_header">
				<h3>Supression d'un Utilisateur</h3>
			</div>
		
		<!--
		 * Corps du module
		 *-->

			<div id="action_body">
<?php
			if(isset($_POST['btn_ok']))
			{
				/**
				* Supression de l'Utilisateur
				*/
			 

				$sql  = "DELETE FROM utilisateur"."\r\n";
				$sql .= "WHERE id=:id;";
					
				$requete = $connectionBDD->prepare($sql);
				$requete->bindParam(':id',$_POST['id']);
			
				$result = $requete->execute();
			
					if($result)
					{
?>
						<p>Supression effectuée.</p>
<?php
					}
					else
					{
?>
						<p>Une erreur est survenue lors de la supression.</p>
						<pre><?print_r($requete->errorInfo(),true)?></pre>
<?php
					}
			
			}
			else
			{
				if(!isset($_POST['btn_annuler']))
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
						<form name="edit" id="edit" action=".?gestion=utilisateur&amp;action=delete" method="post">

							<p>
								Etes-vous sûr de vouloir supprimer l'utilisateur : <br />
								<strong><? echo $resultat['login']; ?></strong>
							</p>
					
					
							<input type="hidden" id="id" name="id" value=" <?php $resultat['id'] ?> " />
							<input type="submit" name="btn_ok" value="OK" />	
							<input type="submit" name="btn_annuler" value="Annuler" />	
								
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
				else
				{
?>
					<p>Opération annulée.</p>
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