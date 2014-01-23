<?php
	require_once('include/connexionBDD.php');
	require_once('include/fonction.php');

	if(!isset($_POST['page']))
	{
		$_POST['page']="accueil";
	}

	switch($_POST['page'])
	{
		case "accueil": include('vue/v_accueil.php');
		break;
		case "formation": include('vue/v_formation.php');
		break;
		case "metier": include('vue/v_metier.php');
		break;
		case "gps": include('vue/v_gps.php');
		break;	
		case "contact": include('scripts/contact.php');
		break;
		case "deconnexion" :
				if(isset($_POST['deconnexion']))
				{
					deconnexion();
				}
		break;
		case "connexion": include('scripts/connexion.php');	
		break;
		case "validConnexion": 
			connexion();	
		break;
	}

	if($_SESSION['connexionOK'] == TRUE)
	{		
		if(isset($_SESSION['groupe']) and $_SESSION['groupe'] == 1)
		{
			/*include('pages/administration/index.admin.php');*/
			if(!isset($_GET['action']))
			{
				$_GET['action']="list";
			}
			
			switch($_GET['action'])
			{
				case 'list':
					if(in_array('utilisateur::list', $_SESSION['droits']))
					{
						include "pages"."/"."administration"."/".'list.admin.php';
						break;
					}
				case 'edit':
					if(in_array('utilisateur::edit', $_SESSION['droits']))
					{
						include "pages"."/"."administration"."/".'edit.admin.php';
						break;
					}
				case 'new':
					if(in_array('utilisateur::new', $_SESSION['droits']))
					{
						include "pages"."/"."administration"."/".'new.admin.php';
						break;
					}
				case 'delete':
					if(in_array('utilisateur::delete', $_SESSION['droits']))
					{
						include "pages"."/"."administration"."/".'delete.admin.php';
						break;
					}
			}
		}
		
		if(isset($_SESSION['groupe']) and $_SESSION['groupe'] == 2)
		{
			include('vue/v_panelCop.php');
		}
	}
?>