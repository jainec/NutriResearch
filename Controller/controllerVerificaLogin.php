<?php
/* so acessa a tela de inicio usuarios autenticados*/
	if(!$_SESSION['usuario_nome']) {
    	header("Location: ../interface_login/index.php");
    	exit();
	}
?>	