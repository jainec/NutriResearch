<?php  
	$id_individuo = $_POST['individuo-selecionado'];

    include 'conexao_bd.php';
  	$query = "DELETE
  			  FROM 
				nutriresearch.individuo
			  WHERE
			    id_individuo = $id_individuo;";
				
	$result_delete = pg_query($conexao, $query);
	
	if($result_delete) {
        header("Location: ../View/interface_calculo/meusIndividuos.php"); /* Redirect browser */
        exit(); 
    }
				

?>

