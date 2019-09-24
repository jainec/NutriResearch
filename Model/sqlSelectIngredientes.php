<?php  

	include 'conexao_bd.php';
	$id_alimento = $_POST['alimento-selecionado'];
	
  	$query = "SELECT 
	  id_alimento_receita,
	  id_ingrediente,
	  ar.id_medida as id_medida,
	  fl_quantidade,
	  tx_nome,
	  bl_status,
	  tx_descricao
  FROM 
	  nutriresearch.alimento_receita ar
  INNER JOIN
	  nutriresearch.alimento a
  ON
	  (ar.id_ingrediente = a.id_alimento)
  INNER JOIN
	  nutriresearch.medida_caseira mc
  ON
	  (mc.id_medida = ar.id_medida)
  WHERE
	  id_alimento_receita = $id_alimento;";
				
    $result_ingredientes = pg_query($conexao, $query);

?>

