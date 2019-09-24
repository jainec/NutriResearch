<?php  
	session_start();
	$id_usuario = $_POST['usuario-selecionado'];
	$isGestor = $_POST['isGestor'];
	$id_usuario_logado = $_SESSION['id_usuario'];

	if($isGestor == 'sim') {
		$bool = 'false';
	} else {
		$bool = 'true';
	}

    include 'conexao_bd.php';
  	$query = "UPDATE
				nutriresearch.usuario
			  SET
			  	bl_gestor = $bool
			  WHERE
			    id_usuario = $id_usuario;";
				
	$result_delete = pg_query($conexao, $query);
	
	if($result_delete) {
		if(($id_usuario == $id_usuario_logado) && $bool == 'false') {
			header("Location: ../View/interface_consulta/buscaAlimento.php"); /* Redirect browser */
		} else {
			header("Location: ../View/interface_gerenciamento/atribuirAdmUsuario.php"); /* Redirect browser */
		}
        exit(); 
    }
				

?>

