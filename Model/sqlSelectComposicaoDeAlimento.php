<?php  
	
	include 'conexao_bd.php';
	
	$id_alimento = $_SESSION['id_alimento'];

  	$query = "SELECT 
	  c.id_alimento as id_alimento,
	  c.id_fonte as id_fonte,
	  c.id_nutriente as id_nutriente,
	  fl_qtd_nutriente,
	  f.tx_descricao as tx_descricao_fonte,
	  f.tx_abreviatura as tx_abreviatura_fonte,
	  n.tx_nome as tx_nome_nutriente,
	  n.tx_abreviatura as tx_abreviatura_nutriente,
	  tx_medida
  FROM nutriresearch.composicao c
		INNER JOIN
		nutriresearch.fonte f
		on (c.id_fonte = f.id_fonte)
		INNER JOIN
			nutriresearch.nutriente n
	  ON (c.id_nutriente = n.id_nutriente)
		WHERE id_alimento = $id_alimento
		AND
		id_medida = 1
		ORDER BY n.id_nutriente;";
				
    $result_composicao = pg_query($conexao, $query);
