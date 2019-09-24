<?php  
	
  include 'conexao_bd.php';
  $id_fonte = $_POST['fonte-selecionada'];
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.fonte
			WHERE
				id_fonte = $id_fonte;";
			
  $result_fonte = pg_query($conexao, $query);
  $row_fonte = pg_fetch_assoc($result_fonte);

?>



