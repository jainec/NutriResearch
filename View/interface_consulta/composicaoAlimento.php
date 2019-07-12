<?php 
    session_start();
    include '../../Controller/controllerVerificaLogin.php';
    include '../../Model/conexao_bd.php';
    $id_alimento = $_SESSION['id_alimento'];

    $query = "SELECT 
                tx_nome, 
                fl_qtd, 
                fl_energia, 
                fl_ptn, 
                fl_carb, 
                fl_lip, 
                fl_ca, 
                fl_fe, 
                fl_vitc, 
                fl_vita,
                tx_descricao
            FROM 
                nutriresearch.composicao c
            INNER JOIN 
                nutriresearch.alimento a
            ON 
                (c.id_alimento = a.id_alimento)
            INNER JOIN 
                nutriresearch.fonte f
            ON 
                (c.id_fonte = f.id_fonte)
            WHERE 
                a.id_alimento = $id_alimento
            AND 
                c.id_medida = 1;";
    $result = pg_query($conexao, $query);
   
    $row = pg_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>

	<title>Composição Alimento</title>

	<link rel="stylesheet" type="text/css" href="css/composicaoAlimento.css">

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
            <p id="pCaminho">Você está em <span> <a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a></span>> <span> <a class="a-caminho" href="menuBusca.php"> Menu Alimento </a></span> > <span id="pCaminhoAtual">Composição</span></p>
            <hr size="20">
        </div>
            
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1><strong>Composição - <?php echo $_SESSION['nome_alimento']?> </strong></h1>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Quanti.<br>(g/ml)</th>
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
                        <tr>
                            <td><?php echo $row['fl_qtd']?></td>
                            <td><?php echo $row['fl_energia']?></td>
                            <td><?php echo $row['fl_ptn']?></td>
                            <td><?php echo $row['fl_carb']?></td>
                            <td><?php echo $row['fl_lip']?></td>
                            <td><?php echo $row['fl_ca']?></td>
                            <td><?php echo $row['fl_fe']?></td>
                            <td><?php echo $row['fl_vitc']?></td>
                            <td><?php echo $row['fl_vita']?></td>
                        </tr>
                    </tbody>    
                </table>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div id="div-fonte">
                    <span>Fonte: <?php echo $row['tx_descricao']; ?></span>
                </div>
                <div id="div-btn-voltar">
                    <a href="menuBusca.php" class="btn btn-dark" role="button">Voltar</a>                
                </div>    
            </div>   
        </div>
    </div>
	<!-- Footer -->
	<footer id="footer" class="page-footer font-small blue">

        <!-- Copyright -->
         <div class="footer-copyright text-center py-3">
             © 2019 Copyright | Jaine Conceição e Raul Andrade
         </div>
         <!-- Copyright -->

   </footer>
   <!-- Footer -->

</body>

</html>