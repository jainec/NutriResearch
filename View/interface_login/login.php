<?php 
session_start(); 

$display = 'none';
$alerta = '';

// logica de email ou senha errados
if (isset($_SESSION['nao_autenticado'])) {
    $display = 'block';
    $alerta = 'Por favor, verifique se o e-mail e senha estão corretos!';
}
unset($_SESSION['nao_autenticado']);

$lembrete = (isset($_SESSION['lembrete'])) ? $_SESSION['lembrete'] : '';
$checked = ($lembrete == 'sim') ? 'checked' : '';

//nao era pra ficar aqui, porem o cookie nao consegue acessar outros diretorios
//logica do lembrar senha e email
if($lembrete == 'sim' ) {
    $expira = time() + 60*60*24*30; 
    setCookie('CookieLembrete','sim', $expira);
    setCookie('CookieEmail', $_SESSION['email'], $expira);
    setCookie('CookieSenha', $_SESSION['senha'], $expira);
}
else {
    setCookie('CookieLembrete');
    setCookie('CookieEmail');
    setCookie('CookieSenha');
    
}
//o ideal seria criptografado
$email = (isset($_COOKIE['CookieEmail'])) ? $_COOKIE['CookieEmail'] : '';
$senha = (isset($_COOKIE['CookieSenha'])) ? $_COOKIE['CookieSenha'] : '';
$lembrete = (isset($_COOKIE['CookieLembrete'])) ? $_COOKIE['CookieLembrete'] : '';

//var_dump($_COOKIE);


?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>

    <!--Jquery-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Material icones-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
 
	<title>Login</title>
    <link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Início	</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="col d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li id="liSobre" class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>    
        <div class="container">
            <div class="d-flex justify-content-center mt-4">
               <!--<h1>Sistema Nutrição</h1>-->
                <img src="icons/nutri_logo3.png" style="width: 150px; height: 110px;" class="rounded mx-auto d-block" alt="...">
            </div>
            <div class="d-flex justify-content-center mt-2 mb-2">
                <h4><strong>Efetuar Login</strong></h4>
                <!--<h1 class="display-3"><i class="icon ion-md-contact"></i></h1>-->
            </div>
            <!-- Exibirá com condicao -->
            <div id="modal" class="modal" tabindex="-1" role="dialog" 
                    style="display: <?=$display?>">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">
                        <?=$alerta?>
                    </h5>
                    <button type="button" class="close close-modal" 
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-footer">
                    <img width="50px;" src="icons/error.png"
                            style="margin-right: 35%;">
                    <button id="btn-ok" type="button" class="btn close-modal"
                            data-dismiss="modal">OK</button>
                    </div>
                </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-4">
                    <form method="POST" action="../../Controller/controllerLogin.php">
                        <div class="form-group">
                            <label for="InputEmail">E-mail:<span class="text-danger">*</span></label>
                            <input name="email" required type="email" class="form-control" id="exampleInputEmail1"  placeholder="Digite o e-mail" 
                             value="<?=$email?>">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Senha:<span class="text-danger">*</span></label>
                            <input name="senha" required type="password" class="form-control" placeholder="Digite a senha" 
                            value="<?=$senha?>" >
                        </div>
                        <div class="form-group">
                            <small id="aviso" class="form-text text-danger">* Campos Obrigatórios</small>
                        </div>
                        <div class="form-group form-check">
                            <input name="lembrete" type="checkbox" class="form-check-input" id="exampleCheck1" 
                            value="sim" <?=$checked?> >
                            <label class="form-check-label" for="exampleCheck1">Lembrar senha</label>
                        </div>
                        <div class="form-group mr-4">
                            <button name="entrar" id="btn-login" type="submit" class="btn btn-light btn-lg btn-block">Login</button>
                        </div>
                        <div class="form-group">
                            <label>Não tem uma conta? <a href="cadastroNoSistema.php"><span >Registre-se</span></a> </label>
                        </div>
                    </form>
                </div>
                </div>  
            </div>
        </div>
    </div>
	<!-- Footer -->
	<footer id="footer2" class="page-footer font-small blue">

        <!-- Copyright -->
         <div class="footer-copyright text-center py-3">
             © 2019 Copyright | Jaine Conceição e Raul Andrade
         </div>
        <!-- Copyright -->

   </footer>
   <!-- Footer -->

   <!-- Script jquery -->
	<script type="text/javascript">
    	jQuery(document).ready(function(){
        	jQuery('.close-modal').on('click', function(event) {        
             jQuery('#modal').toggle('show');
        	});
    	});
	</script>

</body>

</html>