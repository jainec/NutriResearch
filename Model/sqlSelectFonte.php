<?php  
	
  include 'conexao_bd.php';
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.fonte
			ORDER BY
				tx_descricao;";
			
  $result = pg_query($conexao, $query);

?>



