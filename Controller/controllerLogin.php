<?php 
session_start();
include '../Model/conexao_bd.php'; 

// se por acaso o isRequired não funcionar
if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('location: ../View/interface_login/login.php');
    exit();
}

$_SESSION['email'] = $_POST['email'];
$_SESSION['senha'] = $_POST['senha'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$entrar = $_POST['entrar'];

//logica do lembrar
$_SESSION['lembrete'] = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';
$lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';


if(isset($entrar)) {
    /* chamando a query SQL */
    
    include '../Model/sqlLogin.php'; 
    if(pg_num_rows($result) == 0) {    
        $_SESSION['nao_autenticado'] = true;
        header("Location: ../View/interface_login/login.php");
        exit();
    }
    else {
        $_res = pg_fetch_array($result);
        $_SESSION['usuario_nome'] = $_res['tx_nome'];
        $_SESSION['id_usuario'] = $_res['id_usuario'];
        header("Location: ../View/interface_consulta/buscaAlimento.php");
        exit();
    }
}
?>