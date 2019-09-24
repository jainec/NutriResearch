<?php 
session_start();
include 'conexao_bd.php';
$id_usuario = $_SESSION['id_usuario'];

$query = "SELECT 
			i.tx_nome as tx_nome_individuo,
			a.id_num_avaliacao as id_num_avalicao, 
			to_char(a.dt_avaliacao, 'DD/MM/YYYY') as dt_avaliacao,
			d.tx_descricao as tx_descricao_dia,
			r.tx_descricao as tx_descricao_refeicao,
			tm_horario,
			al.tx_nome as tx_nome_alimento,
			m.tx_descricao as tx_descricao_medida,
			a.fl_quantidade as fl_quantidade,
			tx_local_refeicao,
			tx_marca
		FROM
			nutriresearch.avaliacao a
		INNER JOIN
			nutriresearch.individuo i
		ON 
			(a.id_individuo = i.id_individuo)
		INNER JOIN
			nutriresearch.refeicao r
		ON 
			(a.id_refeicao = r.id_refeicao)
		INNER JOIN
			nutriresearch.alimento al
		ON
			(a.id_alimento = al.id_alimento)
		INNER JOIN
			nutriresearch.medida_caseira m
		ON
			(a.id_medida = m.id_medida)
		INNER JOIN
			nutriresearch.dia_da_semana d
		ON
			(a.id_dia_da_semana = d.id_dia_da_semana)
		WHERE
			a.id_usuario = $id_usuario
		ORDER BY
			tx_nome_individuo, id_num_avaliacao, r.id_refeicao;";

	$result = pg_query($conexao, $query);
?>