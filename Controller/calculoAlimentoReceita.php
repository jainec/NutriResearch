<?php 

	function calcularProporcaoReceita($nomeAlimento, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQtnds, $modoDePreparo, $id_fonte) {

		//session_start();
		include '../Model/conexao_bd.php';
		
		if($gramasReceita == 0) {
			return "Division by zero";
		}

		if($gramasReceita < 0) {
			return "Valor informado para as gramas da receita é negativo e, logo, inválido.";
		}

		$porcentagem = 100/$gramasReceita;
		$gramasReceita = 100;
		
		$query_modo_de_preparo = "INSERT INTO
                                nutriresearch.receita_modo_de_preparo(tx_descricao)
                              VALUES
                                ('$modoDePreparo') RETURNING id_receita_modo_de_preparo;";
					
		$result_modo_de_preparo = pg_query($conexao, $query_modo_de_preparo);
		$row=pg_fetch_array($result_modo_de_preparo);
		$id_receita_modo_de_preparo = $row['id_receita_modo_de_preparo'];

		$query_alimento = "INSERT INTO
							nutriresearch.alimento(tx_nome, bl_status, id_receita_modo_de_preparo, bl_is_receita)
						VALUES
							('$nomeAlimento', 'true', $id_receita_modo_de_preparo, 'true') RETURNING id_alimento;";


		$result_select_alimento = pg_query($conexao, $query_alimento);
		$row=pg_fetch_array($result_select_alimento);
		$id_alimento_receita = $row['id_alimento'];

		for ($i = 0; $i < count($arrayIngredientes); $i++) {
			$id_ingrediente = $arrayIngredientes[$i];
			$id_medida = $arrayMedidas[$i];
			$fl_quantidade = $arrayQtnds[$i] * $porcentagem;
	
			$query = "INSERT INTO nutriresearch.alimento_receita VALUES ($id_alimento_receita, $id_ingrediente, $id_medida, $fl_quantidade);";   
		
			$result = pg_query($conexao, $query);
		}

		$total_energia = 0.0;
		$total_ptn = 0.0;
		$total_carb = 0.0;
		$total_lip = 0.0;
		$total_ca = 0.0;
		$total_fe = 0;
		$total_vitc = 0.0;
		$total_vita = 0.0;

		$query_select_composicoes = "SELECT * FROM nutriresearch.alimento_receita r
            INNER JOIN
            nutriresearch.composicao c
            ON r.id_ingrediente = c.id_alimento
            where id_alimento_receita = $id_alimento_receita;";

		$result_select_composicoes = pg_query($conexao, $query_select_composicoes);
		while($row_list=pg_fetch_assoc($result_select_composicoes)) {
			$porcentagem_atual = 100/$row_list['fl_quantidade'];
			$total_energia = $total_energia + $row_list['fl_energia']/$porcentagem_atual;
			$total_ptn = $total_ptn + $row_list['fl_ptn']/$porcentagem_atual;
			$total_carb = $total_carb + $row_list['fl_carb']/$porcentagem_atual;
			$total_lip = $total_lip + $row_list['fl_lip']/$porcentagem_atual;
			$total_ca = $total_ca + $row_list['fl_ca']/$porcentagem_atual;
			$total_fe = $total_fe + $row_list['fl_fe']/$porcentagem_atual;
			$total_vitc = $total_vitc + $row_list['fl_vitc']/$porcentagem_atual;
			$total_vita = $total_vita + $row_list['fl_vita']/$porcentagem_atual;
		}

    	$query_insert_comp = "INSERT INTO nutriresearch.composicao
                            VALUES($id_alimento_receita, 1, $id_fonte, 100, $total_energia, $total_ptn, $total_carb, $total_lip, $total_ca, $total_fe, $total_vitc, $total_vita);";

		$result_insert_comp = pg_query($conexao, $query_insert_comp);
		
		$query_select_alimento_receita = "SELECT 
                tx_nome, 
                fl_qtd, 
                fl_energia, 
                fl_ptn, 
                fl_carb, 
                fl_lip, 
                fl_ca, 
                fl_fe, 
                fl_vitc, 
                fl_vita,
                tx_descricao
            FROM 
                nutriresearch.composicao c
            INNER JOIN 
                nutriresearch.alimento a
            ON 
                (c.id_alimento = a.id_alimento)
            INNER JOIN 
                nutriresearch.fonte f
            ON 
                (c.id_fonte = f.id_fonte)
            WHERE 
                a.id_alimento = $id_alimento_receita
            AND 
                c.id_medida = 1;";
		$result_select_alimento_receita = pg_query($conexao, $query_select_alimento_receita);
	
		$row = pg_fetch_array($result_select_alimento_receita);

		$string = 'Nome do alimento do tipo receita: ' . $row['tx_nome'] . ' Quantidade: ' . $row['fl_qtd'] . ' Energia: ' .$row['fl_energia']. ' Proteina: ' .$row['fl_ptn']. ' Carboidrato: ' .$row['fl_carb']. ' Lipideo: ' .$row['fl_lip']. ' Calcio: ' .$row['fl_ca']. ' Ferro: ' . $row['fl_fe']. ' Vit. C: ' .$row['fl_vitc']. ' Vit. A: ' .$row['fl_vita']. '';
		
		return $string;
	}
?>
