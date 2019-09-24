 <?php
    $id_individuo = $_SESSION['id_individuo-selecionado'];
    $id_num_avaliacao = $_POST['numero-avaliacao'];

    $query = "SELECT * FROM nutriresearch.avaliacao
    where id_individuo = $id_individuo
    and
    id_num_avaliacao = $id_num_avaliacao;";

    $result = pg_query($conexao, $query);

  ?>

