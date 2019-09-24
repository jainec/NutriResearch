<?php

session_start();
$to      = $_POST['enderecoEmail'];
$subject = $_POST['assunto'];
$message = $_POST['mensagem'];;
$headers = 'From: nutriresearch@adm.com' . "\r\n" .
    'Reply-To: jayne-conceicao@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$_SESSION['email-enviado'] = true;
header("Location: ../View/interface_gerenciamento/interfaceGerenciamento.php"); /* Redirect browser */
exit(); 
?> 
