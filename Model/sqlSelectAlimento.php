<?php  
				
	include 'conexao_bd.php';
	$query = "SELECT tx_nome
			  FROM 
			nutriresearch.alimento;";
			
	$result = pg_query($conexao, $query);
	$nomes_alimentos = array();
	while ($row = pg_fetch_row($result)) {
		$nomes_alimentos[] = $row;
	}

?>