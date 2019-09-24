<?php 
    session_start();
    include 'conexao_bd.php';
    $id_nutriente = $_POST['id_nutriente'];
    $tx_nome = $_POST['nome_nutriente'];
    $tx_abreviatura = $_POST['abreviatura_nutriente'];
    $tx_medida = $_POST['medida_nutriente'];

    $query = "UPDATE 
                nutriresearch.nutriente
            SET(tx_nome, tx_abreviatura, tx_medida) = ('$tx_nome', '$tx_abreviatura', '$tx_medida')
            WHERE
            id_nutriente = $id_nutriente;";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['nutriente-atualizado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
?>

