<?php  

    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.usuario
			  ORDER BY
			    tx_nome;";
				
    $result_usuarios = pg_query($conexao, $query);

?>

