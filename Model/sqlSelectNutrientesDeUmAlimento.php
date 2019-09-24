<?php  
	
  include 'conexao_bd.php';
  $id_alimento = $_SESSION['id_alimento'];

	$query = "SELECT n.* FROM nutriresearch.composicao c
	INNER JOIN
	nutriresearch.nutriente n
	ON (c.id_nutriente = n.id_nutriente)
	WHERE id_alimento = $id_alimento
	AND
	id_medida = 1
	ORDER BY id_nutriente;";
			
  $result_nutrientes = pg_query($conexao, $query);

?>



