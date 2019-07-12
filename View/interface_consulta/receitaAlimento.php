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

	<title>Receita</title>

	<link rel="stylesheet" type="text/css" href="css/receitaAlimento.css">

</head>

<body>
    <div class="wrapper">
  <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="buscaAlimento.php">Início </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="buscaAlimento.php">Interface de Busca <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../interface_calculo/interfaceCalculo.php">Interface de Cálculo</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0 w-100">
                <a id="liUsuario" class="nav-link" href=""><img src="icons/loginIcon.svg" width="25px">  <?php  echo $_SESSION['usuario_nome']?></a>
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

    <div>
        <div>
            <p id="pCaminho">Você está em <span> <a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a></span>> <span> <a class="a-caminho" href="menuBusca.php"> Menu Alimento </a></span> > <span id="pCaminhoAtual">Receita</span></p>
            <hr size="20">
        </div>
            
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1><strong>Receita - <?php echo $_SESSION['nome_alimento']?></strong></h1>
            </div>
            <div id="spanReceita" class="row d-flex justify-content-center">
                <h5>Receita para 100g de <?php echo $_SESSION['nome_alimento']?></h5>
            </div>
            <div id="div-ingredientes" class="row d-flex justify-content-center">
                <h5 style="color: #97C447;"><strong>Ingredientes</strong></h5>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="">
                    <table class="table table-striped centered-td">
                        <thead>
                            <tr>
                                <th>Quantidade<br>(g ou uni.)</th>
                                <th>Medida</th>
                                <th>Alimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include '../../Model/sqlSelectReceita.php';
                                while($row_list=pg_fetch_assoc($result)){
                                    echo '<tr><td>'. $row_list['fl_quantidade'] .'</td><td>'. $row_list['tx_descricao'].'</td><td>'. $row_list['tx_nome'].'</td></tr>';
                                }
                            ?>
                        </tbody>    
                    </table>
                </div>
            </div>    


             <div id="div-modo-de-preparo" class="row d-flex justify-content-center">
                <table id="table-modo-de-preparo" class="table table-striped justified-td">
                    <thead>
                        <tr>
                            <th><h5 style="color: #97C447;"><strong>Modo de preparo</strong></h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                include '../../Model/sqlSelectReceita.php';
                                $row_list=pg_fetch_array($result);
                                echo '<td>'. $row_list['modo_de_preparo'] .'</td>';
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="d-flex flex-column align-items-center">
                <div>
                    <a href="menuBusca.php" class="btn btn-dark" role="button">Voltar</a>                
                </div>    
            </div>   
        </div>
    </div>
    <div class="push"></div>
    </div>
    <div class="footer-class">
    	<!-- Footer -->
    	<footer id="footer" class="page-footer font-small blue">

            <!-- Copyright -->
             <div class="footer-copyright text-center py-3">
                 © 2019 Copyright | Jaine Conceição e Raul Andrade
             </div>
             <!-- Copyright -->

       </footer>
       <!-- Footer -->
    </div>

</body>

</html>