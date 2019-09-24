<?php  
	
	include 'conexao_bd.php';
	
	$id_alimento = $_SESSION['id_alimento'];
	$id_medida = $_SESSION['id_medida'];

  	$query = "SELECT c.*, f.tx_descricao as tx_descricao_fonte, m.tx_descricao FROM nutriresearch.composicao c
	  INNER JOIN
	  nutriresearch.fonte f
	  on (c.id_fonte = f.id_fonte)
	  INNER JOIN
	  nutriresearch.medida_caseira m
	  on (c.id_medida = m.id_medida)
	  WHERE id_alimento = $id_alimento
	  AND
	  c.id_medida = $id_medida
	  ORDER BY id_nutriente, id_medida;";
				
    $result_medida_composicao = pg_query($conexao, $query);
