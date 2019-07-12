<?php  

	$id_individuo = $_SESSION['id_individuo-selecionado'];
    include 'conexao_bd.php';
  	$query = "SELECT DISTINCT
  				id_num_avaliacao, 
  				dt_avaliacao
  			  FROM 
				nutriresearch.avaliacao
			  WHERE
			    id_individuo = $id_individuo;";
				
    $result = pg_query($conexao, $query);

?>
