<?php 
    session_start();
    include '../../Controller/controllerVerificaLogin.php';
    include '../../Model/conexao_bd.php'; 
    include '../../Model/sqlMedidasCaseiras.php';
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
	
	<!--Material icones-->
   	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/medidasCaseiras.css">

	<title>Medidas Caseiras</title>

	

</head>

<body>
<nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="buscaAlimento.php">Início </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="buscaAlimento.php">Interface de Busca <span class="sr-only"> (current)</span></a>
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
           <p id="p-caminho">Você está em <span> <a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a></span>><span> <a class="a-caminho" href="menuBusca.php"> Menu Alimento </a></span> > <span id="p-caminho-atual">Medidas Caseiras</span></p>
            <hr size="20">
        </div>
            
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1><strong>Medidas Caseiras - <?=$nome_alimento?></strong></h1>
            </div>
            <?php 
                if (!$result) {
                    echo "query did not execute";
                }
                if (pg_num_rows($result) == 0) { ?>
                    <div class="d-flex justify-content-center pt-5 pb-5">
                            <h4>Nenhuma medida caseira foi encontrada para este alimento!</h4>
                    </div>
                    <div class="d-flex justify-content-center pt-4 pb-4">
                        <i class="icon ion-md-sad display-1"></i>
                    </div>				    
            <?php }
                else { 
                    $fonte = "";
	        ?>	
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Medida</th>
                            <th>Quant.<br>(g/ml)</th>
                            <th>Energia<br>(kal)</th>
                            <th>Ptn.<br>(g)</th>
                            <th>Carb.<br>(g)</th>
                            <th>Lip.<br>(g)</th>
                            <th>Ca<br>(mg)</th>
                            <th>Fe<br>(mg)</th>
                            <th>Vit. C<br>(mg)</th>
                            <th>Vit. A<br>(uG RE)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while ($row = pg_fetch_array($result)) { $fonte = $row['fonte']	?>
                                <tr>
                                    <td> <?=$row['tx_descricao']?> </td>
                                    <td> <?=$row['fl_qtd']?> </td>
                                    <td> <?=$row['fl_energia']?> </td>
                                    <td> <?=$row['fl_ptn']?> </td>
                                    <td> <?=$row['fl_carb']?> </td>
                                    <td> <?=$row['fl_lip']?> </td>
                                    <td> <?=$row['fl_ca']?> </td>
                                    <td> <?=$row['fl_fe']?> </td>
                                    <td> <?=$row['fl_vitc']?> </td>
                                    <td> <?=$row['fl_vita']?> </td>
                                </tr>
                        <?php  }?>
                    </tbody>    
                </table>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div>
                    <span>Fonte: <?=$fonte?></span>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="d-flex flex-column align-items-center">
                <div>
                    <a href="menuBusca.php" class="btn btn-dark m-3" role="button">Voltar</a>
                </div>    
            </div>   
        </div>
    </div>
	<!-- Footer -->
    <?php  
        $linhas = pg_num_rows($result);
        if ($linhas < 5) { ?>
	        <footer id="footer" class="page-footer font-small blue">
    <?php } 
            else { ?>
            <footer id="footer2" class="page-footer font-small blue">
    <?php }?>       
           
        <!-- Copyright -->
         <div class="footer-copyright text-center py-3">
             © 2019 Copyright | Jaine Conceição e Raul Andrade
         </div>
         <!-- Copyright -->

   </footer>
   <!-- Footer -->

</body>

</html>
