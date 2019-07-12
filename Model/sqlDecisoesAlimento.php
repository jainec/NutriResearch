<?php 

$nome_alimento = $_SESSION['nome_alimento'];
$query = "SELECT tx_descricao FROM nutriresearch.alimento 
	JOIN nutriresearch.decisao USING (id_alimento)
	WHERE tx_nome = '$nome_alimento';";

$result = pg_query($conexao, $query);
?>