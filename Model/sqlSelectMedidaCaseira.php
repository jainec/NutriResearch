<?php  
	session_start();
    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.medida_caseira;";
				
    $result = pg_query($conexao, $query);

?>
