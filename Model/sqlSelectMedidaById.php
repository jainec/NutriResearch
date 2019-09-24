<?php  
	
  include 'conexao_bd.php';
  $id_medida = $_POST['medida-selecionada'];
  
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.medida_caseira
			WHERE
				id_medida = $id_medida;";
			
  $result_medida = pg_query($conexao, $query);
  $row_medida = pg_fetch_assoc($result_medida);

?>



