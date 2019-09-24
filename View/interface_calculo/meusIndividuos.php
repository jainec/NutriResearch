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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <title>Meus Indivíduos</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel="stylesheet" type="text/css" href="css/meusIndividuos.css" />

</head>

<body>

    <!-- Sidebar  -->
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Nutri Research</h3>
                <strong>NR</strong>
            </div>

            <ul class="list-unstyled components">

                <li class="">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <?php echo $_SESSION['usuario_nome'] ?>
                    </a>
                </li>
                <li class="">
                    <a href="../interface_consulta/buscaAlimento.php" data-toggle="collapse">
                        <i class="fas fa-search"></i>
                        Interface de Busca
                    </a>
                </li>
                <li class="active">
                    <a href="../interface_calculo/interfaceCalculo.php">
                        <i class="fas fa-tasks"></i>
                        Interface de Cálculo
                    </a>
                </li>
                <?php
                include '../../Model/sqlSelectGestor.php';
                $row = pg_fetch_array($result);
                if ($row['bl_gestor'] == 't') {
                    ?>
                    <li class="">
                        <a href="../interface_gerenciamento/interfaceGerenciamento.php">
                            <i class="fas fa-user-cog"></i>
                            Interface de Gerenciamento
                        </a>
                    </li>
                <?php } ?>
                <li class="">
                    <a href="#">
                        <i class="fas fa-book"></i>
                        Dicionário de Decisões
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-info-circle"></i>
                        Sobre
                    </a>
                </li>
                <li>
                    <a href="../../Controller/controllerLogout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div id="tittle">
                        <h3><strong>Meus Indivíduos</strong></h3>
                    </div>
                </div>
            </nav>


            <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span id="pCaminhoAtual">Visualizar Indivíduos</span></p>

            <div id="divTitulo">
                <h1><strong></strong></h1>
            </div>

            <div class="center-father">
                <div id="board" class="center-child">

                    <h5 style="margin-top: 30px;">Todos os Indivíduos</h5>


                    <form autocomplete="off" id="form-search" name="" action="avaliacaoSelecionarIndividuo.php" method="POST">

                        <div id="container-busca">
                            <div id="div-input-busca">
                                <input name="inputBusca" id="inputBusca" type="text" class="form-control" placeholder="Digite o nome de um indivíduo">
                            </div>
                            <div id="div-search-icon">
                                <input id="search-icon" type="image" name="submit" src="icons/search-icon.png" border="0" alt="Submit" style="width: 21px;" />
                            </div>
                        </div>
                    </form>

                    <div id="div-table-head">
                        <table id="table-head" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col ">Nome</th>
                                    <th class="col ">Avaliar </th>
                                    <th class="col ">Excluir</th>
                                    <th class="col ">Editar</th>
                                    <th class="col ">Visualizar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="div-table">
                        <table class="table table-striped" id="table">
                            <tbody>
                                <?php
                                while ($row_individuos = pg_fetch_array($result1)) { ?>
                                    <tr>
                                        <td class="col-6 ">
                                            <?= $row_individuos['tx_nome'] ?>
                                        </td>
                                        <td class="col-1 pl-4" id="td-avaliar">
                                            <!-- avaliar -->
                                            <form name="" action="cadastroAvaliacao.php" method="POST">
                                                <button type="submit" class="btn btn-sm btn-meus-individuos" value="<?= $row_individuos['id_individuo'] ?>" name="individuo-selecionado">
                                                    <i class="icon ion-md-list-box"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="col-1 pl-4" id="td-excluir">
                                            <!-- excluir -->
                                            <form name="" action="../../Model/sqlDeleteIndividuoById.php" method="POST">
                                                <button type="button" class="btn btn-sm btn-meus-individuos" data-toggle="modal" data-target="#deleteModal-<?php echo $row_individuos['id_individuo']; ?>" >
                                                    <i class="icon ion-md-trash"></i>
                                                </button>
                                                <!-- Modal HTML -->
                                                <div id="deleteModal-<?php echo $row_individuos['id_individuo']; ?>" class="modal fade">
                                                    <div class="modal-dialog modal-confirm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="icon-box">
                                                                    <i class="material-icons">&#xE5CD;</i>
                                                                </div>
                                                                <h4 class="modal-title">Você tem certeza?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Você realmente deseja deletar o registro do indivíduo <?= $row_individuos['tx_nome'] ?>? Esse processo não pode ser desfeito.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger" value="<?= $row_individuos['id_individuo'] ?>" name="individuo-selecionado">Deletar</button>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="col-1 pl-4" id="td-editar">
                                            <!-- editar -->
                                            <form name="" action="edicaoIndividuo.php" method="POST">
                                                <button type="submit" class="btn btn-sm btn-meus-individuos" value="<?= $row_individuos['id_individuo'] ?>" name="individuo-selecionado">
                                                    <i class="icon ion-md-create"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="col-1 pl-4">
                                            <!-- visualizar -->
                                            <form name="" action="visualizarIndividuo.php" method="POST">
                                                <button type="submit" class="btn btn-sm btn-meus-individuos" value="<?= $row_individuos['id_individuo'] ?>" name="individuo-selecionado">
                                                    <i class="icon ion-md-eye"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>


                    </div>
                    <div id="total">
                        <span> Total:
                            <?php $num_individuos = pg_num_rows($result1);
                            echo $num_individuos;
                            ?>
                            indivíduos</span>
                    </div>
                </div>
            </div>


            <!--<div id="div-novo-individuo" class="d-flex justify-content-between">
                    
                    <div>
                        <a href="cadastroIndividuo.php" role="button" class="btn btn-sm btn-meus-individuos a-novo-individuo">
                            <i class="icon ion-md-add-circle"></i>
                            <span>Novo individuo</span>
                        </a>
                        
                    </div>
            </div>-->

            <div id="divBotoes">
                <a id="btnVoltar" href="interfaceCalculo.php" class="btn btn-dark" role="button">Voltar</a>
            </div>

            <div class="relative">
                <div class="footer">
                    © 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
                </div>
            </div>

            <div class="push"></div>
        </div>

        <script type="text/javascript">
            var $rows = $('#table tr');
            $('#inputBusca').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        </script>

        <!--COLAPSAR-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    $(".footer").toggleClass('largerFooter');
                });
            });
        </script>


</body>

</html>