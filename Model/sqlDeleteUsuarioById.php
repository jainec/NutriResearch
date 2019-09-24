<?php  
	$id_usuario = $_POST['usuario-selecionado'];

    include 'conexao_bd.php';
  	$query = "DELETE
  			  FROM 
				nutriresearch.usuario
			  WHERE
			    id_usuario = $id_usuario;";
				
	$result_delete = pg_query($conexao, $query);
	
	if($result_delete) {
        header("Location: ../View/interface_gerenciamento/removerUsuario.php"); /* Redirect browser */
        exit(); 
    }
				

?>

