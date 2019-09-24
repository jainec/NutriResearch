<?php 

$nome_alimento = $_SESSION['nome_alimento'];
$query = "SELECT * FROM nutriresearch.alimento 
	JOIN nutriresearch.decisao USING (id_alimento)
	WHERE tx_nome = '$nome_alimento';";

$result1 = pg_query($conexao, $query);
?>