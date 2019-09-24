<?php 
    session_start();
    include 'conexao_bd.php';
    $id_decisao = $_POST['id_decisao'];
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
   

    $query = "UPDATE 
    			nutriresearch.decisao
              SET(tx_rotulo_de_busca, tx_descricao, id_alimento) = ('$tx_rotulo_busca', '$tx_descricao', $id_alimento)
    		  WHERE
                id_decisao = $id_decisao;";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['decisao-atualizada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

