<?php  
				
	include 'conexao_bd.php';
	$id_alimento_receita = $_SESSION['id_alimento'];
	$query = "SELECT ar.fl_quantidade, mc.tx_descricao, a2.tx_nome, mp.tx_descricao AS modo_de_preparo 
				FROM nutriresearch.alimento_receita ar
				INNER JOIN nutriresearch.alimento a
				ON (ar.id_alimento_receita = a.id_alimento)
				INNER JOIN nutriresearch.medida_caseira mc
				ON (ar.id_medida = mc.id_medida)
				INNER JOIN nutriresearch.alimento a2
				ON (ar.id_ingrediente = a2.id_alimento)
				INNER JOIN nutriresearch.receita_modo_de_preparo mp
				ON (a.id_receita_modo_de_preparo = mp.id_receita_modo_de_preparo)
				WHERE ar.id_alimento_receita = $id_alimento_receita;";
	 
	$result = pg_query($conexao, $query);

	if (!$result OR pg_num_rows($result) == 0) {
    	header("Location: receitaNaoEncontrada.php"); /* Redirect browser */
		exit();
	}			
			

?>
