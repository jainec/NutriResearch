<?php  
	
  include 'conexao_bd.php';
	$id_individuo = $_SESSION['id_individuo-selecionado'];
	$id_num_avaliacao = $_POST['avaliacao-selecionada'];

	$query = "SELECT 
				*
			FROM 
				nutriresearch.fonte;";
			
  $result = pg_query($conexao, $query);

?>



