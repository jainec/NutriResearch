<?php  
	session_start();
    include 'conexao_bd.php';

    $id_num_avaliacao = $_POST['numero-avaliacao'];
    $id_usuario = $_SESSION['id_usuario'];
    $id_individuo = $_SESSION['id_individuo-selecionado'];
    $dt_avaliacao = $_POST['datepicker'];

    for ($i = 0; $i < count($_POST['refeicoes']); $i++) {
	    $id_refeicao = $_POST['refeicoes'][$i];
	    $id_alimento = $_POST['alimentos'][$i];
	   	$id_medida = $_POST['medidas'][$i];
	   	$fl_quantidades = $_POST['quantidades'][$i];

    	$query = "INSERT INTO nutriresearch.avaliacao VALUES ($id_num_avaliacao, $id_usuario, $id_individuo, '$dt_avaliacao', $id_refeicao, $id_alimento, $id_medida, $fl_quantidades);";   
    
    	$result = pg_query($conexao, $query);
    }
    
  	 if($result) {
        $_SESSION['avaliacao-cadastrada'] = true;
        header("Location: ../View/interface_calculo/interfaceCalculo.php"); /* Redirect browser */
        exit(); 
    }
				
    

?>

