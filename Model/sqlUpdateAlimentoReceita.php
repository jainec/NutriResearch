<?php  
	session_start();
    include 'conexao_bd.php';

    $tx_nome = $_POST['inputNome'];
    $fl_qtd = $_POST['inputGramas'];
    $receita_descricao = $_POST['textarea'];
    $id_receita_modo_de_preparo = $_POST['id_receita_modo_de_preparo'];
    $id_alimento = $_POST['id_alimento'];
    $id_fonte = null;

    foreach ($_POST['fontes'] as $select) {
        $id_fonte = $select;
    }

    // LOGICA DE CÁLCULO
    $porcentagem = 100/$fl_qtd;
    $fl_qtd = 100;
    // FIM
    
    $query_modo_de_preparo = "UPDATE 
                                nutriresearch.receita_modo_de_preparo
                              SET tx_descricao = $receita_descricao
                              WHERE
                               id_receita_modo_de_preparo = $id_receita_modo_de_preparo;";
				
    $query_alimento = "UPDATE 
                        nutriresearch.alimento
                       SET
                        tx_nome = '$tx_nome'
                        WHERE id_alimento = $id_alimento;";


    $result_select_alimento = pg_query($conexao, $query_alimento);

    if(!$result_select_alimento) {
        $_SESSION['alimento-receita-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/edicaoAlimentoReceita.php"); /* Redirect browser */
        exit(); 
    } 

    $query_delete = "DELETE FROM nutriresearch.alimento_receita WHERE id_alimento_receita = $id_alimento";
    $result_delete = pg_query($conexao, $query_delete);

    for ($i = 0; $i < count($_POST['alimentos']); $i++) {
        $id_ingrediente = $_POST['alimentos'][$i];
        $id_medida = $_POST['medidas'][$i];
        $fl_quantidade = $_POST['quantidades'][$i] * $porcentagem;

        $query = "INSERT INTO nutriresearch.alimento_receita VALUES ($id_alimento, $id_ingrediente, $id_medida, $fl_quantidade);";   
    
        $result = pg_query($conexao, $query);
    }


    $query_num_nutrientes = "select count(*) as countt from nutriresearch.nutriente;";
    $result_num_nutrientes = pg_query($conexao, $query_num_nutrientes);
    $num_nutrientes = pg_fetch_assoc($result_num_nutrientes);
    $arr_composicao = array_fill(0, $num_nutrientes['countt'], 0);

    $query_select_composicoes = "SELECT 
            *
            FROM nutriresearch.alimento_receita
            where id_alimento_receita = $id_alimento;";
        
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

    $query_delete_composicao = "DELETE FROM nutriresearch.composicao WHERE id_alimento = $id_alimento";
    $result_delete_composicao = pg_query($conexao, $query_delete_composicao);

    for ($i = 1, $len=count($arr_composicao); $i < $len; $i++) {

        $query_insert_comp = "INSERT INTO nutriresearch.composicao
                            VALUES($id_alimento, 1, $id_fonte, 100, $i, $arr_composicao[$i]);";

        $result_insert_comp = pg_query($conexao, $query_insert_comp);
    }
    

    if($result_insert_comp) {
        $_SESSION['alimento-receita-atualizado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    } 

?>

