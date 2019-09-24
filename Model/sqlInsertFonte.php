<?php 
    session_start();
    include 'conexao_bd.php';
    $id_usuario = $_SESSION['id_usuario'];
    $tx_descricao = $_POST['descricao_fonte'];
    $tx_abreviatura = $_POST['abreviatura_fonte'];

    $query = "INSERT INTO 
    			nutriresearch.fonte(tx_descricao, tx_abreviatura)
    		  VALUES('$tx_descricao', '$tx_abreviatura');";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['fonte-cadastrada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

