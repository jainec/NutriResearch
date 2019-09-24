<?php  
	
  include 'conexao_bd.php';
  $id_alimento = $_POST['alimento-selecionado'];
  $id_medida = $_POST['medida-selecionada'];
	
	$query = "SELECT 
				cm.id_alimento as id_alimento,
				id_medida_caseira,
				tx_nome,
				mc.tx_descricao as tx_descricao_medida,
				fl_qtd,
				f.id_fonte as id_fonte,
				f.tx_descricao as tx_descricao_fonte
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
			INNER JOIN
				nutriresearch.fonte f
			ON
				(cm.id_fonte = f.id_fonte)
			WHERE			
				cm.id_alimento = $id_alimento
			AND
				id_medida_caseira = $id_medida
			ORDER BY
				tx_nome, mc.tx_descricao;";
			
  $result_medida_alimento = pg_query($conexao, $query);
  $row_medida_alimento = pg_fetch_assoc($result_medida_alimento);

?>



