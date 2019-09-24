<?php 
    session_start();
    include 'conexao_bd.php';
    $id_fonte = $_POST['id_fonte'];
    $tx_descricao = $_POST['descricao_fonte'];
    $tx_abreviatura = $_POST['abreviatura_fonte'];

    $query = "UPDATE 
    			nutriresearch.fonte
    		  SET(tx_descricao, tx_abreviatura) = ('$tx_descricao', '$tx_abreviatura')
              WHERE
                id_fonte = $id_fonte;";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['fonte-atualizada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

