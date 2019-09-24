<?php  
	
	include 'conexao_bd.php';
	
	$id_alimento = $_SESSION['id_alimento'];

  	$query = "SELECT * FROM nutriresearch.composicao c
	  INNER JOIN
	  nutriresearch.fonte f
	  on (c.id_fonte = f.id_fonte)
	  WHERE id_alimento = $id_alimento
	  AND
	  id_medida = 1
	  ORDER BY id_nutriente;";
				
    $result_composicao = pg_query($conexao, $query);
