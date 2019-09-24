<?php  

	$id_individuo = $_SESSION['id_individuo-selecionado'];
    include 'conexao_bd.php';
  	$query = "SELECT id_num_avaliacao
	          FROM 
			   nutriresearch.avaliacao 
			   WHERE id_individuo = $id_individuo;";
				
	$result_num_avaliacao = pg_query($conexao, $query);
	$num_rows = pg_num_rows($result_num_avaliacao);
	

	$array_num_avaliacao = array();
	while ($row = pg_fetch_row($result_num_avaliacao)) {
		  $array_num_avaliacao[] = $row;
	}


?>
