<?php  
	
    include 'conexao_bd.php';
	$id_individuo =  $_SESSION['id_individuo-selecionado'];
	

  	$query = "SELECT 
  				id_individuo,
  				id_usuario,
  				tx_nome,
  				dt_nascimento,
  				fl_peso,
  				fl_altura,
  				tx_email,
  				tx_celular,
  				CASE
  					WHEN tx_sexo = 'm' THEN 'masculino'
  					ELSE 'feminino'
  				END AS
  				tx_sexo
  			  FROM 
				nutriresearch.individuo
			  WHERE
			    id_individuo = $id_individuo;";
				
    $result = pg_query($conexao, $query);

?>

