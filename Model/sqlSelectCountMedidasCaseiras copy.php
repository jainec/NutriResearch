<?php  
	
	include 'conexao_bd.php';
	
	$id_alimento = $_SESSION['id_alimento'];

  	$query = "SELECT count(*), c.id_medida, m.tx_descricao as tx_descricao_medida, f.tx_descricao as tx_descricao_fonte, fl_qtd
	  FROM nutriresearch.composicao c
	  INNER JOIN
	  nutriresearch.medida_caseira m
	  on(c.id_medida = m.id_medida)
	  INNER JOIN
	  nutriresearch.fonte f
	  on(c.id_fonte = f.id_fonte)
	  WHERE id_alimento = $id_alimento
	  AND
	  c.id_medida <> 1
	  GROUP BY (c.id_medida, m.tx_descricao, f.tx_descricao, fl_qtd)
	  ORDER BY tx_descricao_medida;";
				
    $result_count_medidas = pg_query($conexao, $query);
