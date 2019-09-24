<?php  

	$id_usuario = $_SESSION['id_usuario'];
	$id_indivudo = $_SESSION['id_individuo-selecionado-edicao'];

    include 'conexao_bd.php';
  	$query = "SELECT id_individuo, id_usuario, tx_nome, to_char(dt_nascimento, 'DD-MM-YYYY') AS dt_nascimento, tx_sexo,
	  			fl_peso, fl_altura, tx_email, tx_celular, fl_circunferencia_cintura, cidade, estado
  			  FROM 
				nutriresearch.individuo
			  WHERE
			    id_usuario = $id_usuario
			  AND
			    id_individuo = $id_indivudo;";
				
	$result2 = pg_query($conexao, $query);
	$row_individuo = pg_fetch_array($result2);

?>

