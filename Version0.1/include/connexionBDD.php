<?php  
		// connexion sur serveur local
		$dblogin='root';
		$dbpassword='';
		$dbhost="localhost";
		$dbname='gps';
		$dbport='3306';
		
	$dns = "mysql:host=".$dbhost.";dbname=".$dbname.";port=".$dbport.";";
	try
	{
		$connectionBDD = new PDO($dns, $dblogin, $dbpassword); // connection a la BDD
		$connectionBDD->exec('SET NAMES utf8'); //encodage UTF-8
	} 
	catch ( Exception $e ) 
	{
		echo "Connection à MySQL impossible : ", $e->getMessage(); // Erreur si la connection est impossible
	}
	
?>