<?php 
session_start();
include '../Model/conexao_bd.php';

// se por acaso o isRequired não funcionar
if (empty($_POST['nome']) || empty($_POST['email1']) || empty($_POST['senha1'])) {
    header('location: ../View/interface_login/index.php');
    exit();
}

// logica de verificacao dos emails e senha
if (($_POST['email1'] != $_POST['email2']) && ($_POST['senha1'] != $_POST['senha2'])){
    $_SESSION['alerta'] = 'Os e-mails e as senhas são diferentes';
    header("Location: ../View/interface_login/index.php");
    exit();
}
else if (($_POST['email1'] != $_POST['email2'])){
    $_SESSION['alerta'] = 'Os e-mails digitados não são iguais';
    header("Location: ../View/interface_login/index.php");
    exit();
}
else if (($_POST['senha1'] != $_POST['senha2'])){
    $_SESSION['alerta'] = 'As senhas digitadas não são iguais';
    header("Location: ../View/interface_login/index.php");
    exit();
}

$_SESSION['nome'] = $_POST['nome'];
$_SESSION['email'] = $_POST['email1'];
$_SESSION['senha'] = $_POST['senha1'];
$nome = $_POST['nome'];
$email = $_POST['email1'];
$senha = $_POST['senha1'];
$registrar = $_POST['registrar'];


if(isset($registrar)) {
    /* chamando a query SQL */
    include '../Model/sqlCadastroNoSistema.php'; 
    echo $num_rows;
    if ($num_rows != 0) {
        $_SESSION['nao_cadastrado'] = true;
        header("Location: ../View/interface_login/index.php");
        exit();
    }
    else {
        $_SESSION['cadastrado'] = true;
        include '../Model/sqlLogin.php'; 
        $_res = pg_fetch_array($result);
        $_SESSION['usuario_nome'] = $_res['tx_nome'];
        $_SESSION['id_usuario'] = $_res['id_usuario'];
        header("Location: ../View/interface_login/introducao.php");
        exit();
    }
}

?>