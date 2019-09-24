<?php  

	include 'conexao_bd.php';
	$id_alimento = $_POST['value'];

	$query = "SELECT 
				1 as id_medida,
				'Gramas' as tx_descricao
				UNION
				SELECT
				id_medida, 
				tx_descricao				
			FROM
				nutriresearch.composicao_x_medida_caseira c
			INNER JOIN
				nutriresearch.medida_caseira m
			ON
				(c.id_medida_caseira = m.id_medida)
			WHERE
				id_alimento = $id_alimento
			ORDER BY
				tx_descricao;";
					
	    $result_medidas = pg_query($conexao, $query);
	
		while ($row_medidas = pg_fetch_assoc($result_medidas)) {
			?>
			<option value=<?= $row_medidas['id_medida'] ?>>
				<?= $row_medidas['tx_descricao'] ?>
			</option>
		<?php
		}
		
?>

