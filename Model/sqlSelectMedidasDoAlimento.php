<?php  

    include 'conexao_bd.php';
    if (isset($_POST['value'])) {
	    $id_alimento = $_POST['value'];
	    echo $id_alimento;

	  	$query = "SELECT 
	  				mc.id_medida AS id_medida,
					mc.tx_descricao AS tx_descricao
				FROM
					nutriresearch.composicao c
				INNER JOIN
					nutriresearch.alimento a
				ON
					a.id_alimento = c.id_alimento
				INNER JOIN
					nutriresearch.medida_caseira mc
				ON
					c.id_medida = mc.id_medida
				WHERE
					a.id_alimento = $id_alimento;";
					
	    $result = pg_query($conexao, $query);
	} else {
		$query = "SELECT 
					mc.id_medida AS id_medida,
					mc.tx_descricao AS tx_descricao
				FROM
					nutriresearch.medida_caseira mc
				WHERE
					id_medida = 1;";
		$result = pg_query($conexao, $query);
	}

?>

