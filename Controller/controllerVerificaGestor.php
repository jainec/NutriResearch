<?php

include 'D:\xampp\htdocs\NutriResearch\Model\sqlSelectGestor.php';
$row = pg_fetch_array($result);

if ($row['bl_gestor'] == 'f') {
	session_start();
    session_destroy();
    unset($_SESSION);
    session_regenerate_id(true);
	header("Location: ../interface_login/index.php");
	exit();
} 
