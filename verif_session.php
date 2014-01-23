<?php
	session_start();
	require_once('Modele/connexionBDD.php');
	
	if(isset($_SESSION['connexionOK']))
	{
		if($_SESSION['connexionOK'] == TRUE )
		{
			if(isset($_SESSION['login']) and isset($_SESSION['mdp']))
			{	
				$req = $connectionBDD->query("SELECT * FROM utilisateur 
												WHERE login = '".$_SESSION['login']."' 
												AND mdp = '".$_SESSION['mdp']."';");
			}
		}
	}
	if(!isset($_SESSION['connexionOK']))
	{
		$_SESSION['connexionOK'] = FALSE;
	}
?>