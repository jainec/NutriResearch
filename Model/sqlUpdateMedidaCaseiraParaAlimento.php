<?php  
    session_start();
    include 'conexao_bd.php';

    $id_alimento = $_POST['id_alimento'];
    $id_medida_caseira = $_POST['id_medida'];
    $id_fonte = null;
    $fl_qtd = $_POST['inputQtd'];

    foreach ($_POST['fontes'] as $select) {
        $id_fonte = $select;
    }
    
    $query = "UPDATE
                nutriresearch.composicao_x_medida_caseira
              SET(id_fonte, fl_qtd) = ( $id_fonte, $fl_qtd)
              WHERE
                id_alimento = $id_alimento
              AND
                id_medida_caseira = $id_medida_caseira;";
				
    $result = pg_query($conexao, $query);
   

    if($result) {
        $_SESSION['medida-caseira-alimento-atualizada'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }

?>


