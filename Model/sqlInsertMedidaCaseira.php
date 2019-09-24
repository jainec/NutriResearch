<?php 
    session_start();
    include 'conexao_bd.php';
    $id_usuario = $_SESSION['id_usuario'];
    $tx_descricao = $_POST['descricao_medida'];

    $queryChecagem ="SELECT * FROM 
        nutriresearch.medida_caseira
        WHERE tx_descricao = '$tx_descricao'";
    $resultChecagem = pg_query($conexao, $queryChecagem);


    if(pg_num_rows($resultChecagem) > 0) {
        $_SESSION['medida-ja-cadastrada'] = true;
        header("Location: ../View/interface_gerenciamento/cadastroMedidaCaseira.php"); /* Redirect browser */
        exit();
    }

    $query = "INSERT INTO 
    			nutriresearch.medida_caseira(tx_descricao)
    		  VALUES('$tx_descricao');";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['medida-cadastrada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

