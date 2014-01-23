<?php 
	require_once('include/connexionBDD.php');
	include('vue/v_panelAdmin.php');
	
	$requete = $connectionBDD->prepare('SELECT * FROM utilisateur ;');
	$requete->execute();
	$donnees = $requete->fetchAll();
			
	foreach($donnees as $ligne)
	{	
				
		echo $ligne['login']. "\t";
		echo $ligne['mdp']. "\t";
		echo $ligne['nom']. "\t";
		echo $ligne['prenom']. "\t";
		echo $ligne['add_mail']. "\n";
	}		
?>