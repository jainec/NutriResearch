<?php  
	
  include 'conexao_bd.php';
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.alimento
			WHERE
				bl_is_receita = 'false'
			ORDER BY
				tx_nome;";
			
  $result = pg_query($conexao, $query);

?>


