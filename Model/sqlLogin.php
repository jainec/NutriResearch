<?php 

$query = "SELECT id_usuario, tx_nome, tx_email, tx_senha
                FROM nutriresearch.usuario 
                WHERE tx_email = '$email' AND tx_senha = '$senha';";
$result = pg_query($conexao, $query);

?>