<?php 
    session_start();
    include 'conexao_bd.php';
    include 'sqlSelectIdsNutrientes.php';
    $id_alimento = $_POST['id_alimento'];
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

    $query = "UPDATE  
    			        nutriresearch.alimento
                SET tx_nome = '$tx_nome'
    		      WHERE 
                id_alimento = $id_alimento;";
    
    $result = pg_query($conexao, $query);

    if(!$result) {
      $_SESSION['alimento-ja-cadastrado'] = true;
      header("Location: ../View/interface_gerenciamento/edicaoAlimento.php"); /* Redirect browser */
      exit(); 
  }


    while($row = pg_fetch_array($result_ids_nutrientes)) {
      $id_nutriente = $row['id_nutriente'];
      if ($_POST['nutriente-'.$id_nutriente] == null) {
        $fl_qtd_nutriente = 'null';
      } else {
        $fl_qtd_nutriente = $_POST['nutriente-'.$id_nutriente]*$porcentagem;
      }
      $query2 = "UPDATE  
                  nutriresearch.composicao
                  SET(id_fonte, fl_qtd_nutriente) = ($id_fonte, $fl_qtd_nutriente)
                WHERE
                  id_alimento = $id_alimento
                  AND
                    id_nutriente = $id_nutriente;";
      $result2 = pg_query($conexao, $query2);
    }

    if($result2) {
        $_SESSION['alimento-atualizado'] = true;
        header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
        exit(); 
    }
    
    
?>


