<?php 
    session_start();
    include '../../Controller/controllerVerificaLogin.php';
    include '../../Model/conexao_bd.php'; 
    include '../../Model/sqlMeusIndividuos.php';
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    
    <!-- Jquery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

    <!--Material icones-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

	<title>Meus Indíduos</title>
    <link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/meusIndividuos.css">

</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../interface_consulta/buscaAlimento.php">Interface de Busca <span class="sr-only"> (current)</span></a>
                    </li>
                    <li class="nav-item active">
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
           <p id="p-caminho">Você está em <span> <a class="a-caminho" href="interfaceCalculo.php"> Interface de Calculo </a> > <span id="p-caminho-atual">Meus Indivíduos</span></p>
            <hr size="20">
        </div>
        <div class="container">
            <div id="h1-meus-individuos" class="d-flex justify-content-center">
                <h1><strong>Meus indivíduos</strong></h1>
            </div>
            <?php 
                if (!$result) {
                    echo "query did not execute";
                }
                if (pg_num_rows($result) == 0) { ?>
                    <div class="d-flex justify-content-center pt-5 pb-5">
                            <h4>Você ainda não cadastrou nenhum indivíduo!</h4>
                    </div>
                    <div class="d-flex justify-content-center pt-4 pb-4">
                        <i class="icon ion-md-sad display-1"></i>
                    </div>
            <?php }
                else { 
            ?>        	
            <div id="div-usuario-e-busca" class="d-flex justify-content-between">
                <div class="col-3 d-flex align-items-center">
                    <!--<span class="badge badge-secondary">Usuário: </span>-->
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <span>Todos indivíduos cadastrados</span>
                </div>
                
                <div class="input-group input-group-sm col-3">
                    <div class="form-group row">
                        <i class="material-icons d-flex align-items-center col-sm-2">search</i>
                        <input id="input-individuo" type="text" class="form-control col-sm-10"
                        placeholder="Nome do indivíduo" aria-label="individuo" aria-describedby="basic-addon1"/>
                    </div>
                </div>
            
            </div>
            <div id="div-box-individuos" class="">
                <div class="div-box-content">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="col-6 ">Nome</th>
                                <th class="col-1 ">Avaliar </th>
                                <th class="col-1 ">Excluir</th>
                                <th class="col-1 ">Editar</th>
                                <th class="col-1 ">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($row = pg_fetch_array($result)) { ?>
                            <tr>
                                <td class="col-6 ">
                                    <?=$row['tx_nome']?>
                                </td>
                                <td class="col-1 pl-4">
                                    <!-- avaliar -->
                                    <form name="" action="cadastroAvaliacao.php" method="POST">
                                        <button type="submit" class="btn btn-sm btn-meus-individuos"
                                                value="<?=$row['id_individuo']?>" name="individuo-selecionado">
                                            <i class="icon ion-md-list-box"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="col-1 pl-4">
                                    <!-- excluir -->
                                    <form name="" action="" method="POST">
                                        <button type="button" class="btn btn-sm btn-meus-individuos"
                                                value="<?=$row['id_individuo']?>" name="individuo-selecionado">
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="col-1 pl-4">
                                    <!-- editar -->
                                    <form name="" action="" method="POST">
                                        <button type="button" class="btn btn-sm btn-meus-individuos"
                                                value="<?=$row['id_individuo']?>" name="individuo-selecionado">
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </form>

                                </td>
                                <td class="col-1 pl-4">
                                    <!-- visualizar -->
                                    <form name="" action="visualizarIndividuo.php" method="POST">
                                        <button type="submit" class="btn btn-sm btn-meus-individuos"
                                                value="<?=$row['id_individuo']?>" name="individuo-selecionado">
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </form>    
                                </td>
                            </tr>
                            <?php 
                             }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div id="div-novo-individuo" class="d-flex justify-content-between">
                    <div>
                        <span> Total: 
                            <?php $num_individuos = pg_num_rows($result); 
                                  echo $num_individuos;
                            ?> 
                            indivíduos</span>
                    </div>
                    <div>
                        <a href="cadastroIndividuo.php" role="button" class="btn btn-sm btn-meus-individuos a-novo-individuo">
                            <i class="icon ion-md-add-circle"></i>
                            <span>Novo individuo</span>
                        </a>
                        
                    </div>
            </div>
            <div class="d-flex flex-column align-items-center">    
            <a href="interfaceCalculo.php" class="btn btn-dark m-3" role="button">Voltar</a>
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
   <script type="text/javascript">
        var $rows = $('#table tr');
        $('#input-individuo').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    </script>
</body>

</html>