<?php  
	

  include 'conexao_bd.php';
  $id_alimento = $_POST['alimento-selecionado'];
	
	$query = "SELECT 
				a.*,
				r.*,
				c.id_fonte as id_fonte
			FROM 
				nutriresearch.alimento a
			INNER JOIN
				nutriresearch.receita_modo_de_preparo r
			ON
				(a.id_receita_modo_de_preparo = r.id_receita_modo_de_preparo)
			INNER JOIN
				nutriresearch.composicao c
			ON
				(a.id_alimento = c.id_alimento)
			WHERE			
				a.id_alimento = $id_alimento;";
			
  $result_alimento = pg_query($conexao, $query);
  $row_alimento = pg_fetch_assoc($result_alimento);

?>



