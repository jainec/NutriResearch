<?php  
	
  include 'conexao_bd.php';

	$query = "SELECT
				id_nutriente
			FROM
				nutriresearch.nutriente
			ORDER BY
				id_nutriente;";
			
  $result_ids_nutrientes = pg_query($conexao, $query);

?>



