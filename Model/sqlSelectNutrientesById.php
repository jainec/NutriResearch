<?php  
	
  include 'conexao_bd.php';

	$query = "SELECT 
				*
			FROM 
				nutriresearch.nutriente
			ORDER BY
			    id_nutriente;";
			
  $result_nutrientes = pg_query($conexao, $query);

?>



