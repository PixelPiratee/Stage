<?php include('vue/v_connexion.php'); ?>
	<script>
		jQuery('#connex').click(function()
		{
			var loginvalue = $('#login').val();
			var mdpvalue = $('#mdp').val();
			var verif = true;
			if(loginvalue.length==0 || mdpvalue.length==0)
			{
				alert('vous n\'avez pas remplis les champs de connexion');
				verif = false;
			}
				return verif ;
		});
	</script>