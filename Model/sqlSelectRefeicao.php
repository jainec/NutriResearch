<?php  
		
    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.refeicao;";
				
    $result = pg_query($conexao, $query);

?>