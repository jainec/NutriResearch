 <?php
    if (!empty($_POST)) {
      $nome_alimento = $_POST['inputBusca'];
        $result = pg_query($conexao, "SELECT id_alimento, tx_nome FROM nutriresearch.alimento WHERE UPPER(tx_nome) = UPPER('$nome_alimento');");
        if (!$result OR pg_num_rows($result) == 0) {
          $_SESSION['nome_alimento'] = $nome_alimento;
          header("Location: alimentoNaoEncontrado.php"); /* Redirect browser */
        exit();
        }
    
        $row = pg_fetch_array($result);
        $_SESSION['id_alimento'] = $row['id_alimento'];
        $_SESSION['nome_alimento'] = $row['tx_nome'];
    }
  ?>

