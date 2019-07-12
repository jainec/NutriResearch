<?php 
    session_start();
    include 'conexao_bd.php';
    $id_usuario = $_SESSION['id_usuario'];
    $tx_nome = $_POST['inputNome'];
    $dt_nascimento = $_POST['inputData'];
    $tx_sexo = $_POST['radio'];
    $fl_peso = $_POST['inputPeso'];
    $fl_altura = $_POST['inputAltura'];
    $tx_email = $_POST['inputEmail'];
    $tx_celular = $_POST['inputCelular'];

    $query = "INSERT INTO 
    			nutriresearch.individuo(id_usuario, tx_nome, dt_nascimento, tx_sexo, fl_peso, fl_altura, tx_email, tx_celular)
    		  VALUES($id_usuario, '$tx_nome', '$dt_nascimento', '$tx_sexo', $fl_peso, $fl_altura, '$tx_email', '$tx_celular');";
    $result = pg_query($conexao, $query);

    if($result) {
        $_SESSION['individuo-cadastrado'] = true;
        header("Location: ../View/interface_calculo/interfaceCalculo.php"); /* Redirect browser */
        exit(); 
    }
    
?>

