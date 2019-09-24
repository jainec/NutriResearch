<?php  
	

  include 'conexao_bd.php';
  $id_alimento = $_POST['alimento-selecionado'];
  $_SESSION['id_alimento'] = $id_alimento;
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.alimento
			WHERE			
				id_alimento = $id_alimento;";
			
  $result_alimento = pg_query($conexao, $query);
  $row_alimento = pg_fetch_assoc($result_alimento);

?>



