<?php 
    include 'conexao_bd.php';

    $query = "SELECT 
                id_alimento,
                tx_nome
            FROM
                nutriresearch.alimento;";
    $result = pg_query($conexao, $query);
    
    $row = pg_fetch_array($result);
?>