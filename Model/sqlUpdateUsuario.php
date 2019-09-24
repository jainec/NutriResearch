<?php  
	session_start();
	include 'conexao_bd.php';
	
	$id_usuario = $_POST['inputIdUsuario'];
	$tx_nome = $_POST['inputNome'];
	$tx_senha = $_POST['inputSenha'];
	$tx_email = $_POST['inputEmail'];

  	$query = "UPDATE
				nutriresearch.usuario
			SET(tx_nome, tx_senha, tx_email) =
			   ('$tx_nome', '$tx_senha', '$tx_email')
			WHERE
				id_usuario = $id_usuario;";
				
	$result = pg_query($conexao, $query);
	
	if($result) {
		$_SESSION['usuario-atualizado'] = true;
        header("Location: ../View/interface_login/meuPerfil.php"); /* Redirect browser */
        exit(); 
    }
?>
