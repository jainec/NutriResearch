<?php 
    session_start();
    include 'conexao_bd.php';
    include 'sqlSelectIdsNutrientes.php';
    $tx_nome = $_POST['inputNome'];
    $fl_qtd = $_POST['inputGramas'];
    $id_fonte = null;

    foreach ($_POST['medidas'] as $select) {
        $id_fonte = $select;
    }

    if($fl_qtd != 100) {
        $porcentagem = 100/$fl_qtd;
        $fl_qtd = 100;
    } else {
      $porcentagem = 1;
    }

    $query = "INSERT INTO 
    			        nutriresearch.alimento(tx_nome, bl_status, bl_is_receita)
    		      VALUES('$tx_nome', 'true', 'false');";
    
    $result = pg_query($conexao, $query);

    if(!$result) {
      $_SESSION['alimento-ja-cadastrado'] = true;
      header("Location: ../View/interface_gerenciamento/cadastroAlimento.php"); /* Redirect browser */
      exit(); 
  }

    $query1 = "SELECT
                id_alimento
              FROM
                nutriresearch.alimento
              WHERE tx_nome = '$tx_nome';";

    $result1 = pg_query($conexao, $query1);
    $row=pg_fetch_array($result1);
    $id_alimento = $row['id_alimento'];


    while($row = pg_fetch_array($result_ids_nutrientes)) {
      $id_nutriente = $row['id_nutriente'];
      if ($_POST['nutriente-'.$id_nutriente] == null) {
        $fl_qtd_nutriente = 'null';
      } else {
        $fl_qtd_nutriente = $_POST['nutriente-'.$id_nutriente]*$porcentagem;
      }
      $query2 = "INSERT INTO 
                  nutriresearch.composicao
                VALUES($id_alimento, 1, $id_fonte, $fl_qtd, $id_nutriente, $fl_qtd_nutriente);";
      $result2 = pg_query($conexao, $query2);
    }

    if($result1 && $result2) {
        $_SESSION['alimento-cadastrado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }  else {
        $query_final = "DELETE FROM nutriresearch.alimente WHERE tx_nome LIKE '$tx_nome';";
        $result_final = pg_query($conexao, $query_final);
    }
    
    
?>


