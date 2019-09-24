<?php  
	
	include 'conexao_bd.php';
	$id_usuario = $_SESSION['id_usuario'];
	
	$query = "SELECT 
				    bl_gestor
			      FROM 
			        nutriresearch.usuario
		        WHERE
		          id_usuario = $id_usuario;";
			
  $result = pg_query($conexao, $query);

?>


