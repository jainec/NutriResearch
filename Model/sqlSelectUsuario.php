<?php  

	$id_usuario = $_SESSION['id_usuario'];
    include 'conexao_bd.php';
  	$query = "SELECT
			*
			FROM
				nutriresearch.usuario
			WHERE
				id_usuario = $id_usuario;";
				
    $result = pg_query($conexao, $query);
	$row_usuario = pg_fetch_array($result);
?>
