<?php  
	session_start();
	$id_individuo = $_SESSION['id_individuo-selecionado'];
	$id_num_avaliacao = $_POST['avaliacao-selecionada'];

    include 'conexao_bd.php';
  	$query = "DELETE
  			  FROM 
				nutriresearch.avaliacao
			  WHERE
			    id_individuo = $id_individuo
			  AND
			   id_num_avaliacao = $id_num_avaliacao;";
				
	$result_delete = pg_query($conexao, $query);
	
	if($result_delete) {
		$_SESSION['delete-avaliacao'] = true;
        header("Location: ../View/interface_calculo/visualizarIndividuo.php"); /* Redirect browser */
        exit(); 
    }
				

?>

