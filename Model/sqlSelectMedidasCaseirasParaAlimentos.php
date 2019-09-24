<?php  
	
  include 'conexao_bd.php';
	
	$query = "SELECT 
				cm.id_alimento as id_alimento,
				id_medida_caseira,
				tx_nome,
				tx_descricao
			FROM 
				nutriresearch.composicao_x_medida_caseira cm
			INNER JOIN
				nutriresearch.alimento a
			ON 
				(cm.id_alimento = a.id_alimento)
			INNER JOIN
				nutriresearch.medida_caseira mc
			ON 
				(cm.id_medida_caseira = mc.id_medida)
			ORDER BY
				tx_nome, tx_descricao;";
			
  $result = pg_query($conexao, $query);

?>



