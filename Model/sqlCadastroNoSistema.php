<?php 

$query_verificar = "SELECT tx_email
                FROM nutriresearch.usuario 
                WHERE tx_email = '$email';";

$result_verificar = pg_query($conexao, $query_verificar);

$num_rows = pg_num_rows($result_verificar);

if($num_rows == 0) {
    $query_cadastrar = " INSERT INTO 
                nutriResearch.usuario(tx_nome, tx_senha, tx_email, bl_gestor, bl_usuario_temporario, bl_usuario_pendente) 
                VALUES
                ('$nome', '$senha', '$email', false, true, false);";

    $result_cadastrar = pg_query($conexao, $query_cadastrar);
}
?>