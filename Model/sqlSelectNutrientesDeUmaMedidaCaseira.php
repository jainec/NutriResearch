<?php  
	
  include 'conexao_bd.php';
  $id_alimento = $_SESSION['id_alimento'];
  $id_medida = $_SESSION['id_medida'];

	$query = "SELECT n.* FROM nutriresearch.composicao c
	INNER JOIN
	nutriresearch.nutriente n
	ON (c.id_nutriente = n.id_nutriente)
	WHERE id_alimento = $id_alimento
	AND
	id_medida = $id_medida
	ORDER BY id_nutriente;";
			
  $result_nutrientes_medida = pg_query($conexao, $query);

?>



