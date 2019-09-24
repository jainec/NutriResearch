<?php  
	
    include 'conexao_bd.php';
	$id_usuario = $_POST['usuario-selecionado'];
	

  	$query = "SELECT 
  				*
  			  FROM 
				nutriresearch.usuario
			  WHERE
			    id_usuario = $id_usuario;";
				
    $result = pg_query($conexao, $query);

?>



