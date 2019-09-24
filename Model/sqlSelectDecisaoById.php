<?php  
	
  include 'conexao_bd.php';
  $id_decisao = $_POST['decisao-selecionada'];
  
	
	$query = "SELECT 
				*
			FROM 
				nutriresearch.decisao
			WHERE
				id_decisao = $id_decisao;";
			
  $result_decisao = pg_query($conexao, $query);
  $row_decisao = pg_fetch_assoc($result_decisao);

?>



