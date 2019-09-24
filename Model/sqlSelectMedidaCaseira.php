<?php  
	
    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.medida_caseira
			  WHERE
			    id_medida <> 1
			  ORDER BY 
			  	tx_descricao;";
				
    $result = pg_query($conexao, $query);

?>
