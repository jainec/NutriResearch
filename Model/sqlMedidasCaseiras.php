<?php 
    
$nome_alimento = $_SESSION['nome_alimento'];
$fonte = "\"fonte\"";
$query = "SELECT m.tx_descricao, c.fl_qtd, c.fl_energia, c.fl_ptn, c.fl_carb, 
            c.fl_lip, c.fl_ca, c.fl_fe, c.fl_vitc, c.fl_vita, (f.tx_descricao) $fonte
                FROM nutriresearch.alimento AS a
                JOIN nutriresearch.composicao AS c USING (id_alimento)
                JOIN nutriresearch.medida_caseira AS m USING (id_medida)
                JOIN nutriresearch.fonte AS f USING (id_fonte)
                WHERE a.tx_nome = '$nome_alimento' AND m.tx_descricao <> 'Gramas';";

$result1 = pg_query($conexao, $query);

?>