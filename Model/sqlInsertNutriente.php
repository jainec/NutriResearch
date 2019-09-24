<?php 
    session_start();
    include 'conexao_bd.php';
    $id_usuario = $_SESSION['id_usuario'];
    $tx_nome = $_POST['nome_nutriente'];
    $tx_abreviatura = $_POST['abreviatura_nutriente'];
    $tx_medida = $_POST['medida_nutriente'];

    $query_select = "SELECT 
            tx_nome
        FROM
            nutriresearch.nutriente
        WHERE
            tx_nome LIKE '$tx_nome';";

    $result_select = pg_query($conexao, $query_select);
    
    if(pg_num_rows($result_select) > 0) {
        $_SESSION['nutriente-ja-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/cadastroNutriente.php"); /* Redirect browser */
        exit();
    }

    $query = "INSERT INTO 
    			nutriresearch.nutriente(tx_nome, tx_abreviatura, tx_medida)
    		  VALUES('$tx_nome', '$tx_abreviatura', '$tx_medida');";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['nutriente-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

