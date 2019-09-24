<?php  
    session_start();
    include 'conexao_bd.php';

    $id_alimento = null;
    $id_medida_caseira = null;
    $id_fonte = null;
    $fl_qtd = $_POST['inputQtd'];

    foreach ($_POST['alimentos'] as $select) {
        $id_alimento = $select;
    }

    foreach ($_POST['medidas'] as $select) {
        $id_medida_caseira = $select;
    }

    foreach ($_POST['fontes'] as $select) {
        $id_fonte = $select;
    }

    include 'sqlSelectMedidaCaseiraDoAlimento.php';
    if(pg_num_rows($result_check) > 0) {
        $_SESSION['medida-caseira-alimento'] = true;
        header("Location: ../View/interface_gerenciamento/cadastroMedidaCaseiraParaAlimento.php"); /* Redirect browser */
        exit(); 
    }
    
    $query = "INSERT INTO
                nutriresearch.composicao_x_medida_caseira
              VALUES
                ($id_alimento, $id_medida_caseira, $id_fonte, $fl_qtd, 'true');";
				
    $result = pg_query($conexao, $query);
   

    if($result) {
        $_SESSION['medida-caseira-alimento'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }

?>


