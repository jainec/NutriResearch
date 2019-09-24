<?php

include '../Model/sqlSelectMedidaCaseira.php';
$row = pg_fetch_array($result);

if (!$row['bl_gestor']) {
	header("Location: ../interface_login/index.php");
	exit();
}
