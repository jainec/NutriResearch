<?php  
	
	$nome_usuario = $_SESSION['input-busca-individuo-avaliacao'];
	$id_usuario = $_SESSION['id_usuario'];

    include 'conexao_bd.php';
  	$query = "SELECT *
  			  FROM 
				nutriresearch.individuo
			  WHERE
			    UPPER(tx_nome) LIKE UPPER('%$nome_usuario%')
			  AND
			  	id_usuario = $id_usuario
			  ORDER BY
			    tx_nome;";
				
    $result = pg_query($conexao, $query);
    if (pg_num_rows($result) == 0) {
    	echo '<div style="text-align: center;"><strong>Nenhum indivíduo foi encontrado!</strong></div>';
    }

?>


