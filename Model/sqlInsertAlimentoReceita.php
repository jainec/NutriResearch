<?php  
	session_start();
    include 'conexao_bd.php';

    $tx_nome = $_POST['input-nome'];
    $fl_qtd = $_POST['inputGramas'];
    $receita_descricao = $_POST['textarea'];
    $id_fonte = null;

    foreach ($_POST['fontes'] as $select) {
        $id_fonte = $select;
    }

    // LOGICA DE CÁLCULO
    $porcentagem = 100/$fl_qtd;
    $fl_qtd = 100;
    // FIM
    
    $query_modo_de_preparo = "INSERT INTO
                                nutriresearch.receita_modo_de_preparo(tx_descricao)
                              VALUES
                                ('$receita_descricao') RETURNING id_receita_modo_de_preparo;";
				
    $result_modo_de_preparo = pg_query($conexao, $query_modo_de_preparo);
    $row=pg_fetch_array($result_modo_de_preparo);
    $id_receita_modo_de_preparo = $row['id_receita_modo_de_preparo'];

    $query_alimento = "INSERT INTO
                        nutriresearch.alimento(tx_nome, bl_status, id_receita_modo_de_preparo, bl_is_receita)
                       VALUES
                        ('$tx_nome', 'true', $id_receita_modo_de_preparo, 'true') RETURNING id_alimento;";


    $result_select_alimento = pg_query($conexao, $query_alimento);
    $row=pg_fetch_array($result_select_alimento);
    $id_alimento_receita = $row['id_alimento'];


    for ($i = 0; $i < count($_POST['alimentos']); $i++) {
        $id_ingrediente = $_POST['alimentos'][$i];
        $id_medida = $_POST['medidas'][$i];
        $fl_quantidade = $_POST['quantidades'][$i] * $porcentagem;

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

    if($result && $result_insert_comp) {
        $_SESSION['alimento-receita-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }


?>


