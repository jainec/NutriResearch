<?php  
	
	include 'conexao_bd.php';
	$id_alimento = null;
    $id_medida_caseira = null;

    foreach ($_POST['alimentos'] as $select) {
        $id_alimento = $select;
    }

    foreach ($_POST['medidas'] as $select) {
        $id_medida_caseira = $select;
    }

  	$query = "SELECT *
  			  FROM 
				nutriresearch.composicao_x_medida_caseira
			  WHERE
			    id_alimento = $id_alimento
			  AND
			  	id_medida_caseira = $id_medida_caseira;";
				
    $result_check = pg_query($conexao, $query);

?>
