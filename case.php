<?php
	require_once('Modele/connexionBDD.php');
	require_once('fonction.php');

if(!isset($_POST['page']))
{
	$_POST['page']="accueil";
}

switch($_POST['page'])
{
	case "accueil": include('pages/accueil.php');
	break;
	case "formation": include('pages/formation.php');
	break;
	case "metier": include('pages/metier.php');
	break;
	case "gps": include('pages/gps.php');
	break;	
	case "contact": include('pages/contact.php');
	break;
	case "deconnexion" :
			if(isset($_POST['deconnexion']))
			{
				deconnexion();
			}
	break;
	case "connexion": include('pages/connexion.php');	
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
					include('pages/panelCop.php');
				}
			}
/*if($_SESSION['connexionOK'] == FALSE)
			{
				include('pages/connexion.php');
			}
			if($_SESSION['connexionOK'] == TRUE)
			{		
			
				if(isset($_SESSION['id_groupe']) and $_SESSION['id_groupe'] == 1)
				{
					include('pages/panelAdmin.php');
				}
				if(isset($_SESSION['id_groupe']) and $_SESSION['id_groupe'] == 2)
				{
					include('pages/panelCop.php');
				}
			} */
?>