<?php  

	$id_usuario = $_SESSION['id_usuario'];
    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.individuo
			  WHERE
			    id_usuario = $id_usuario
			  ORDER BY
			    tx_nome;";
				
    $result = pg_query($conexao, $query);

?>

