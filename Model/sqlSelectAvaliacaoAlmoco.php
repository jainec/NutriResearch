 <?php
    $id_individuo = $_SESSION['id_individuo-selecionado'];
    $id_num_avaliacao = $_POST['avaliacao-selecionada'];

    $query = "SELECT
    a.id_num_avaliacao as id_num_avaliacao,
    a.id_usuario as id_usuario,
    a.id_individuo as id_individuo,
    to_char(a.dt_avaliacao, 'DD/MM/YYYY') as dt_avaliacao, 
    a.id_refeicao as id_refeicao,
    a.id_alimento as id_alimento,
    a.id_medida as id_medida,
    a.fl_quantidade as fl_quantidade,
    tx_local_refeicao,
    tx_marca,
    a.id_dia_da_semana as id_dia_da_semana,
    tm_horario,
    i.tx_nome as tx_nome_individuo,
    al.tx_nome as tx_nome_alimento,
    mc.tx_descricao as tx_descricao_medida,
    d.tx_descricao as tx_descrica_dia_da_semana
   FROM 
   nutriresearch.avaliacao a
   INNER JOIN
   nutriresearch.individuo i
   ON(a.id_individuo = i.id_individuo)
   INNER JOIN
   nutriresearch.alimento al
   ON(a.id_alimento = al.id_alimento)
   INNER JOIN
   nutriresearch.medida_caseira mc
   ON(a.id_medida = mc.id_medida)
   INNER JOIN
   nutriresearch.dia_da_semana d
   ON(a.id_dia_da_semana = d.id_dia_da_semana)
   WHERE a.id_individuo = $id_individuo
   AND
   a.id_num_avaliacao = $id_num_avaliacao
   AND
   id_refeicao = 3;";

    $result = pg_query($conexao, $query);

  ?>

