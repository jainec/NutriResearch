<?php  
	session_start();
    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.alimento
			  ORDER BY
			  	tx_nome;";
				
    $result = pg_query($conexao, $query);

?>

