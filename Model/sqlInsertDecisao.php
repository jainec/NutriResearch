<?php 
    session_start();
    include 'conexao_bd.php';
    $tx_rotulo_busca = $_POST['rotulo'];
    $tx_descricao = $_POST['decisao'];
    $id_alimento = null;
    $radio = $_POST['options'];

    if($radio == 1) {
        foreach ($_POST['alimentos'] as $select) {
            $id_alimento = $select;
        }
    } else {
        $id_alimento = 'null';
    }
   

    $query = "INSERT INTO 
    			nutriresearch.decisao(tx_rotulo_de_busca, tx_descricao, id_alimento)
    		  VALUES('$tx_rotulo_busca', '$tx_descricao', $id_alimento);";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['decisao-cadastrada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

