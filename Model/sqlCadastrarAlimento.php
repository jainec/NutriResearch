<?php 
    session_start();
    include 'conexao_bd.php';
    $tx_nome = $_POST['inputNome'];
    $fl_qtd = $_POST['inputGramas'];
    $fl_energia = $_POST['inputEnergia'];
    $fl_ptn = $_POST['inputPtn'];
    $fl_carb = $_POST['inputCarb'];
    $fl_lip = $_POST['inputLip'];
    $fl_ca = $_POST['inputCa'];
    $fl_fe = $_POST['inputFe'];
    $fl_vitc = $_POST['inputVitC'];
    $fl_vita = $_POST['inputVitA'];
    $id_fonte = null;

    foreach ($_POST['medidas'] as $select) {
        $id_fonte = $select;
    }

    if($fl_qtd != 100) {
        $porcentagem = 100/$fl_qtd;
        $fl_qtd = 100;
        $fl_energia = $fl_energia * $porcentagem;
        $fl_ptn = $fl_ptn * $porcentagem;
        $fl_carb = $fl_carb * $porcentagem;
        $fl_lip = $fl_lip * $porcentagem;
        $fl_ca = $fl_ca * $porcentagem;
        $fl_fe = $fl_fe * $porcentagem;
        $fl_vitc = $fl_vitc * $porcentagem;
        $fl_vita = $fl_vita * $porcentagem;
    }

    $query = "INSERT INTO 
    			nutriresearch.alimento(tx_nome, bl_status, bl_is_receita)
    		  VALUES('$tx_nome', 'true', 'false');";
    $result = pg_query($conexao, $query);

    $query1 = "SELECT
                id_alimento
              FROM
                nutriresearch.alimento
              WHERE tx_nome = '$tx_nome';";
    $result1 = pg_query($conexao, $query1);
    $row=pg_fetch_array($result1);
    $id_alimento = $row['id_alimento'];

    $query2 = "INSERT INTO 
                nutriresearch.composicao
              VALUES($id_alimento, 1, $id_fonte, $fl_qtd, $fl_energia, $fl_ptn, $fl_carb, $fl_lip, $fl_ca, $fl_fe, $fl_vitc, $fl_vita);";
    $result2 = pg_query($conexao, $query2);

    if($result && $result2) {
        $_SESSION['alimento-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>


