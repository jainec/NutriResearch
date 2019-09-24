<?php  
	session_start();
    include 'conexao_bd.php';

    $tx_nome = $_POST['inputNome'];
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

    if(!$result_select_alimento) {
        $_SESSION['alimento-receita-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/cadastroAlimentoReceita.php"); /* Redirect browser */
        exit(); 
    } 

    $row=pg_fetch_array($result_select_alimento);
    $id_alimento_receita = $row['id_alimento'];


    for ($i = 0; $i < count($_POST['alimentos']); $i++) {
        $id_ingrediente = $_POST['alimentos'][$i];
        $id_medida = $_POST['medidas'][$i];
        $fl_quantidade = $_POST['quantidades'][$i] * $porcentagem;

        $query = "INSERT INTO nutriresearch.alimento_receita VALUES ($id_alimento_receita, $id_ingrediente, $id_medida, $fl_quantidade);";   
    
        $result = pg_query($conexao, $query);
    }


    $query_num_nutrientes = "select count(*) as countt from nutriresearch.nutriente;";
    $result_num_nutrientes = pg_query($conexao, $query_num_nutrientes);
    $num_nutrientes = pg_fetch_assoc($result_num_nutrientes);
    $arr_composicao = array_fill(0, $num_nutrientes['countt'], 0);

    $query_select_composicoes = "SELECT 
            *
            FROM nutriresearch.alimento_receita
            where id_alimento_receita = $id_alimento_receita;";
        
    $result_select_composicoes = pg_query($conexao, $query_select_composicoes);
    while($row_list=pg_fetch_assoc($result_select_composicoes)) {
        if($row_list['id_medida'] == 1) {
            $porcentagem_atual = 100/$row_list['fl_quantidade'];
        } else {
            $medida = $row_list['id_medida'];
            $ingrediente = $row_list['id_ingrediente'];
                $query_select_composicoes2 = "SELECT 
                *
                FROM nutriresearch.composicao_x_medida_caseira
                where id_alimento = $ingrediente
                and
                    id_medida_caseira = $medida;";
            $result_select_composicoes2 = pg_query($conexao, $query_select_composicoes2);
            $row_medida = pg_fetch_assoc($result_select_composicoes2);

            $porcentagem_atual = 100/($row_list['fl_quantidade'] * $row_medida['fl_qtd']);
        }

        $_SESSION['id_alimento'] = $row_list['id_ingrediente'];

        include 'sqlSelectComposicao.php';
        
        while($row_list_nutrientes=pg_fetch_assoc($result_composicao)) {
            $arr_composicao[$row_list_nutrientes['id_nutriente']] = $arr_composicao[$row_list_nutrientes['id_nutriente']] + $row_list_nutrientes['fl_qtd_nutriente']/$porcentagem_atual;
        }
    }

    for ($i = 1, $len=count($arr_composicao); $i < $len; $i++) {

        $query_insert_comp = "INSERT INTO nutriresearch.composicao
                            VALUES($id_alimento_receita, 1, $id_fonte, 100, $i, $arr_composicao[$i]);";

        $result_insert_comp = pg_query($conexao, $query_insert_comp);
    }
    

    if($result_insert_comp) {
        $_SESSION['alimento-receita-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    } 

?>


