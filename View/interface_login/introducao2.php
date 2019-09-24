<?php 
	session_start();
	include '../../Controller/controllerVerificaLogin.php';
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8"> 
    
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
        
        <title>Introdução</title>
        <link rel="icon" href="icons/nutri_logo3.png">
        <link rel="stylesheet" type="text/css" href="css/introducao.css">
    
    </head>

    <body>
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="#">Início </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Interface de Busca <span class="sr-only"> (current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../interface_calculo/interfaceCalculo.php">Interface de Cálculo</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0 w-100">
                <a id="liUsuario" class="nav-link" href=""><img src="icons/loginIcon.svg" width="25px">  <?=$_SESSION['usuario_nome']?></a>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li id="liDicionario" class="nav-item">
                        <a class="nav-link" href="#">Dicionário de Decisões</a>
                    </li>
                    <li id="liSobre" class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                    <li id="liSair" class="nav-item">
                        <a class="nav-link" href="../../Controller/controllerLogout.php">Sair <img style="margin-left: 7px;" src="icons/logout.png" width="20px"></a>
                    </li>
                </ul>
            </div>
        </nav>
       
        <div class="container">
        <div class="jumbotron" style="text-align: center;">
            <img src="icons/nutri_logo3.png" width="170px">
                
                    <h4 class="display-5 mt-3">Olá, <?=$_SESSION['usuario_nome']?>! Estamos contente com a sua inscrição em nosso sistema, 
                    esperamos que o Nutri Research satisfaça as suas necessidades. </h4>
                
                    <p class="lead mt-5">Para acessar o sistema use o botão abaixo.</p>
                    <a id="" class="btn btn-lg btn-dark" href="../interface_consulta/buscaAlimento.php" role="button">Acessar</a>
                    <hr class="my-4">
                    <lu>
                        <li> 
                            <span class="lead">Você pode acessar o manual do usuário clicando 
                                <a target="_blank" href="../../Manual_do_usuario_Nutri_Research.pdf" class="a-introducao">aqui</a>.</span>
                        </li>
                    </lu>
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

    </body>

</html>