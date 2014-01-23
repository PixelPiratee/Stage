<?php if(isset($_SESSION["login"]) AND isset($_SESSION["mdp"])){
   
   echo "<p>Bienvenue <strong>".$_SESSION["login"]."</strong></p>";
   
} ?>