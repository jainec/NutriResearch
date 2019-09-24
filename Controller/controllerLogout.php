<?php 
	/* destroindo todas as sessoes */
	session_start();
    session_destroy();
    unset($_SESSION);
    session_regenerate_id(true);
	header("Location: ../View/interface_login/index.php");
	
?>