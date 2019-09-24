<?php  

	$id_individuo = $_SESSION['id_individuo-selecionado'];
    include 'conexao_bd.php';
  	$query = "SELECT DISTINCT
  				id_num_avaliacao, 
  				to_char(dt_avaliacao, 'DD/MM/YYYY') as dt_avaliacao
  			  FROM 
				nutriresearch.avaliacao
			  WHERE
			    id_individuo = $id_individuo
			  ORDER BY id_num_avaliacao;";
				
    $result = pg_query($conexao, $query);

?>
