<?php 
    session_start();
    include 'conexao_bd.php';
    $id_usuario = $_SESSION['id_usuario'];
    $id_individuo = $_SESSION['id_individuo-selecionado-edicao'];
    $tx_nome = $_POST['inputNome'];
    $dt_nascimento = $_POST['inputData'];
    if(!isset($_POST['radio'])) {
        $_POST['radio'] = 'null';
    }
    $tx_sexo = $_POST['radio'];
    $fl_peso = $_POST['inputPeso'];
    $fl_altura = $_POST['inputAltura'];
    $tx_email = $_POST['inputEmail'];
    $tx_celular = $_POST['inputCelular'];
    $fl_circunferencia_cintura = $_POST['cincurferenciaCintura'];
    $tx_cidade = $_POST['cidade'];
    $tx_estado = $_POST['estado'];

    $hasDate = false;

    if($dt_nascimento == null) {
        $dt_nascimento = 'null';
    } else {
        $hasDate = true;
    }
    
    if($fl_altura == null) {
        $fl_altura = 'null';
    }

    if($fl_peso == null) {
        $fl_peso = 'null';
    }

    if($fl_circunferencia_cintura == null) {
        $fl_circunferencia_cintura = 'null';
    }

    if($hasDate) {
        $query = "UPDATE 
                    nutriresearch.individuo
                SET(tx_nome, dt_nascimento, tx_sexo, fl_peso, fl_altura, tx_email, tx_celular, fl_circunferencia_cintura, cidade, estado) =
                ('$tx_nome', '$dt_nascimento', '$tx_sexo', $fl_peso, $fl_altura, '$tx_email', '$tx_celular', $fl_circunferencia_cintura, '$tx_cidade', '$tx_estado')
                WHERE
                id_usuario = $id_usuario
                AND
                id_individuo = $id_individuo;";
    } else {
        $query = "UPDATE 
        nutriresearch.individuo
        SET(tx_nome, dt_nascimento, tx_sexo, fl_peso, fl_altura, tx_email, tx_celular, fl_circunferencia_cintura, cidade, estado) =
        ('$tx_nome', $dt_nascimento, '$tx_sexo', $fl_peso, $fl_altura, '$tx_email', '$tx_celular', $fl_circunferencia_cintura, '$tx_cidade', '$tx_estado')
        WHERE
        id_usuario = $id_usuario
        AND
        id_individuo = $id_individuo;";
    }
    
    $result = pg_query($conexao, $query);

    if($result) {
        header("Location: ../View/interface_calculo/meusIndividuos.php"); /* Redirect browser */
        exit(); 
    }
