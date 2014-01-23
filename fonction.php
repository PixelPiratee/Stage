<?php 
	require_once('Modele/connexionBDD.php');

function deconnexion() 
{ 	
	session_unset($_SESSION);
	session_destroy();
	session_start();
	$_SESSION['connexionOK'] = FALSE;
	
}

function connexion()
{
	global $connectionBDD ;	
	// On met les variables utilisés du script PHP à FALSE.
	$error = FALSE;

	// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
	if(isset($_POST["validConnexion"]))
	{
		
	   
	   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.   
	  /* if(empty($_POST["login"]) OR empty($_POST["mdp"]))
	   {
		  
		  $error = TRUE;
		  
		  $errorMSG = "Vous devez remplir tout les champs !";
		  
	   }*/
	   
		   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
		   
				$requete = $connectionBDD->prepare('SELECT * FROM utilisateur WHERE login = :login AND mdp = :mdp ;');
				$requete->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
				$requete->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
				$requete->execute();
			
				 // Si oui, on continue le script...      
				  if($requete)
					{  
		  
						// On récupère toute les données de l'utilisateur dans la base de données.
						
						$donnees = $requete->fetchAll();
						foreach($donnees as $ligne)
						{
							$ligne["id"];
							$ligne["mdp"];
						}
						$_SESSION["id"] = $ligne["id"];
									
						// Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...         
						if($_POST["mdp"] == $ligne["mdp"])
						{
						
							$_SESSION['connexionOK'] = TRUE;
							   
							$connexionMSG = "Connexion au site réussie. Vous êtes désormais connecté !";
							   
							$_SESSION["login"] = $_POST["login"];
							   
							$_SESSION["mdp"] = $_POST["mdp"];
							   
							//groupe
							$requete = $connectionBDD->prepare('SELECT * FROM appartenir INNER JOIN groupe ON id_groupe = id WHERE id_utilisateur = :id_utilisateur;');
							$requete->bindParam(':id_utilisateur',$_SESSION['id']);
							$requete->execute();
							$resultats = $requete->fetchAll();
							foreach ($resultats as $ligne)
							{
								$ligne['id_groupe'];	
							}
							$_SESSION['groupe'] = $ligne['id_groupe'];
							
							
							
							/**
							 * Chargement des groupes
							 */

							$sql="SELECT * FROM appartenir INNER JOIN groupe ON id_groupe = id WHERE id_utilisateur = :id_utilisateur;";
							$requete =  $connectionBDD->prepare($sql);
							$requete->bindParam(':id_utilisateur',$_SESSION['id']);
							$requete->execute();
							if($requete->rowCount())
							{
								$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
								foreach ($resultats as $resultat)
								{
									$_SESSION['groupes'][$resultat['id']] = $resultat['libelle'];
								}
							}
							else
							{
								$_SESSION['groupes'] = array();
								$_SESSION['droits'] = array();
							}
							
							/**
							 * Chargement des droits
							 */
							
							foreach ($_SESSION['groupes'] as $id => $nom)
							{
								$sql="SELECT * from donner INNER JOIN droit ON id_droit = id WHERE id_groupe = :id_groupe;";
								$requete = $connectionBDD->prepare($sql);
								$requete->bindParam(':id_groupe',$id);
								$requete->execute();
								if($requete->rowCount())
								{
									$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
									foreach ($resultats as $resultat)
									{
										$_SESSION['droits'][$resultat['id']] = $resultat['nom'];
									}
								}
								else
								{
									$_SESSION['droits'] = array();
								}
							}
						}
						// Sinon on lui affiche un message d'erreur.
						else
						{
						
						   $error = TRUE;
						
						   $errorMSG = "Nom de compte ou mot de passe incorrect !";
						
						}      
					}
				  
				  // Sinon on lui affiche un message d'erreur.      
					else
					{
						$error = TRUE;
					 
						$errorMSG = "Nom de compte ou mot de passe incorrect !";
					 
					}
	   
	}
	   
}

	/*$connectionBDD = NULL;*/




?>
