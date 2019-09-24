<?php 
    session_start();
    include 'conexao_bd.php';
    $id_medida = $_POST['id_medida'];
    $tx_descricao = $_POST['descricao_medida'];

    $queryChecagem ="SELECT * FROM 
        nutriresearch.medida_caseira
        WHERE tx_descricao = '$tx_descricao';";
    $resultChecagem = pg_query($conexao, $queryChecagem);


    if(pg_num_rows($resultChecagem) > 0) {
        $_SESSION['medida-ja-cadastrada-edicao'] = true;
        header("Location: ../View/interface_gerenciamento/editarMedidaCaseira.php"); /* Redirect browser */
        exit();
    }

    $query = "UPDATE
    nutriresearch.medida_caseira
    SET tx_descricao = '$tx_descricao'
    WHERE
      id_medida = $id_medida;";

    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['medida-atualizada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

