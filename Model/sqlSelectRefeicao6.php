<?php  
	
  include 'conexao_bd.php';
	$id_individuo = $_SESSION['id_individuo-selecionado'];
	$id_num_avaliacao = $_POST['avaliacao-selecionada'];

	$query = "SELECT 
				a.*,
				r.tx_descricao AS refeicao,
				al.*,
				mc.tx_descricao AS medida
			FROM 
				nutriresearch.avaliacao a
			INNER JOIN
				nutriresearch.refeicao r
			ON
				a.id_refeicao = r.id_refeicao
			INNER JOIN
				nutriresearch.alimento al
			ON
				a.id_alimento = al.id_alimento
			INNER JOIN
				nutriresearch.medida_caseira mc
			ON
				a.id_medida = mc.id_medida
		  	WHERE
		    	id_individuo = $id_individuo
      		AND
        		id_num_avaliacao = $id_num_avaliacao
        	AND
        		r.id_refeicao = 6;";
			
  $result = pg_query($conexao, $query);

?>


