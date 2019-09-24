<?php 


$query = "SELECT * FROM nutriresearch.decisao
         ORDER BY tx_rotulo_de_busca;";

$result1 = pg_query($conexao, $query);
?>