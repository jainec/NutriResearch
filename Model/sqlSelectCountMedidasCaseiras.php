<?php  
	
	include 'conexao_bd.php';
	
	$id_alimento = $_SESSION['id_alimento'];

  	$query = "SELECT (select count(*) FROM nutriresearch.composicao_x_medida_caseira where id_alimento = $id_alimento) as countt, 
	  		c.id_medida_caseira, 
			m.tx_descricao as tx_descricao_medida, 
			f.tx_descricao as tx_descricao_fonte, 
			fl_qtd
	  FROM nutriresearch.composicao_x_medida_caseira c
	  INNER JOIN
	  nutriresearch.medida_caseira m
	  on(c.id_medida_caseira = m.id_medida)
	  INNER JOIN
	  nutriresearch.fonte f
	  on(c.id_fonte = f.id_fonte)
	  WHERE id_alimento = $id_alimento
	  ORDER BY tx_descricao_medida;";
				
    $result_count_medidas = pg_query($conexao, $query);
