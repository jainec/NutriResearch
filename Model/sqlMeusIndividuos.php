<?php 

$usuario_nome = (isset($_SESSION['usuario_nome'])) ? $_SESSION['usuario_nome'] : "Raul Andrade";
$query = "SELECT i.id_individuo, i.tx_nome FROM nutriresearch.usuario AS u
                JOIN  nutriresearch.individuo AS i
                USING (id_usuario)
                WHERE u.tx_nome = '$usuario_nome'
                ORDER BY i.tx_nome ASC;";

$result = pg_query($conexao, $query);

?>