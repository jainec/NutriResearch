<?php  
	
  include 'conexao_bd.php';
  $id_nutriente = $_POST['nutriente-selecionado'];
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.nutriente
			WHERE			
				id_nutriente = $id_nutriente;";
			
  $result_nutriente = pg_query($conexao, $query);
  $row_nutriente = pg_fetch_assoc($result_nutriente);

?>



