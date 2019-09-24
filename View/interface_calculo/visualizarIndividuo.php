<?php

session_start();
include '../../Controller/controllerVerificaLogin.php';
if (!isset($_SESSION['delete-avaliacao'])) {
    $_SESSION['id_individuo-selecionado'] = $_POST['individuo-selecionado'];
} else {
    $_SESSION['delete-avaliacao'] = null;
}
?>


<!DOCTYPE html>
<html>

<head>
    <!--<meta charset="UTF-8"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
-->


    <!-- CSS Files -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <title>Cadastrar Avaliação</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel = "stylesheet" type = "text/css" href = "css/cadastroAvaliacao.css" />-->

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Visualizar Indivíduo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- Bootstrap CSS CDN -->

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="css/bootstrap.min2.css" rel="stylesheet" />
    <link href="css/gsdk-bootstrap-wizard2.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/visualizarIndividuo.css" />




</head>

<body>
    <div class="wrapper">
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
        </div>
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div id="container-title">
                        <div id="sidebarSymbol">
                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                            </button>
                        </div>
                        <div id="sidebarTitle">
                            <h3><strong>Indivíduo</strong></h3>
                        </div>
                    </div>

                </div>
            </nav>

            <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span><a class="a-caminho" href="avaliacaoSelecionarIndividuo.php">Selecionar Indivíduo</a></span> > <span id="pCaminhoAtual">Cadastrar Avaliação</span></p>


            <div id="divTitulo"></div>


            <div class="center-father">
                <!--   Big container   -->
                <div class="container center-child">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">

                            <!--      Wizard container        -->
                            <div class="wizard-container">
                                <div class="card wizard-card" data-color="blue" id="wizard">
                                    <form action="" method="">
                                        <!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->


                                        <div class="wizard-navigation">
                                            <ul>
                                                <li><a href="#location" data-toggle="tab">Dados Pessoais</a></li>
                                                <li><a href="#facilities" data-toggle="tab">Avaliações</a></li>

                                            </ul>
                                        </div>

                                        <div id="board-content" class="tab-content">
                                            <div class="tab-pane" id="location">
                                                <div class="row">
                                                    <div class="col-sm-12">

                                                        <div id="div-dados">
                                                            <?php
                                                            include '../../Model/sqlSelectIndividuoPeloId.php';
                                                            $row_list = pg_fetch_assoc($result);
                                                            ?>

                                                            <div id="divNomeData">
                                                                <div id="divNome" class="form-group">
                                                                    <label for="inputNome">Nome completo:</label>
                                                                    <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $row_list['tx_nome'] ?>" disabled=”disabled”>
                                                                </div>
                                                                <div id="divData" class="form-group">
                                                                    <label for="inputData">Data de Nascimento:</label>
                                                                    <input type="text" id="inputData" name="inputData" class="form-control phone-mask" placeholder="dd/mm/aaaa" disabled=”disabled” value=<?php echo $row_list['dt_nascimento'] ?>>
                                                                </div>
                                                            </div>
                                                            <div id="divPesoAlturaSexo">
                                                                <div id="divPeso" class="form-group">
                                                                    <label for="inputPeso">Peso (Kg):</label>
                                                                    <input type="number" min="0" step="0.01" class="form-control" id="inputPeso" name="inputPeso" disabled=”disabled” value=<?php echo $row_list['fl_peso'] ?>>
                                                                </div>
                                                                <div id="divAltura" class="form-group">
                                                                    <label for="inputAltura">Altura (m):</label>
                                                                    <input type="number" min="0" step="0.01" class="form-control" id="inputAltura" name="inputAltura" disabled=”disabled” value=<?php echo $row_list['fl_altura'] ?>>
                                                                </div>
                                                                <div id="divSexo" class="form-group form-check">
                                                                    <label class="form-check-label">Sexo:</label>
                                                                    <div>
                                                                        <?php if ($row_list['tx_sexo'] == 'f') { ?>
                                                                            <input type="radio" name="radio" value="f" checked="checked" disabled=”disabled”>Feminino<br>
                                                                            <input type="radio" name="radio" value="m" disabled=”disabled”>Masculino<br>
                                                                        <?php } else if ($row_list['tx_sexo'] == 'm') { ?>
                                                                            <input type="radio" name="radio" value="f" disabled=”disabled”>Feminino<br>
                                                                            <input type="radio" name="radio" value="m" checked="checked" disabled=”disabled”>Masculino<br>
                                                                        <?php } else { ?>
                                                                            <input type="radio" name="radio" value="f" disabled=”disabled”>Feminino<br>
                                                                            <input type="radio" name="radio" value="m" disabled=”disabled”>Masculino<br>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="divPesoAlturaSexo">
                                                                <div id="divPeso" class="form-group">
                                                                    <label for="cincurferenciaCintura">Circunf. da cintura:</label>
                                                                    <input type="number" min="0" step="0.01" class="form-control" id="cincurferenciaCintura" name="cincurferenciaCintura" aria-describedby="cincurferenciaCintura" disabled=”disabled” value=<?php echo $row_list['fl_circunferencia_cintura'] ?>>
                                                                </div>
                                                                <div id="divAltura" class="form-group">
                                                                    <label for="cidade">Cidade:</label>
                                                                    <input type="text" id="cidade" name="cidade" class="form-control" disabled=”disabled” value="<?php echo $row_list['cidade'] ?>">
                                                                </div>
                                                                <div id="divSexo" class="form-group">
                                                                    <label for="estado">Estado:</label>
                                                                    <input type="text" id="estado" name="estado" class="form-control" disabled=”disabled” value="<?php echo $row_list['estado'] ?>">
                                                                </div>


                                                            </div>
                                                            <div id="divEmailCelular">
                                                                <div id="divEmail" class="form-group">
                                                                    <label for="inputEmail">E-mail:</label>
                                                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" disabled=”disabled” aria-describedby="emailHelp" value="<?php echo $row_list['tx_email'] ?>">
                                                                </div>
                                                                <div id="divCelular" class="form-group">
                                                                    <label for="inputCelular">Celular:</label>
                                                                    <input type="text" id="inputCelular" name="inputCelular" class="form-control" disabled=”disabled” value="<?php echo $row_list['tx_celular'] ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="facilities">

                                                <form autocomplete="off" id="form-search" name="" action="visualizarIndividuo.php" method="POST">
                                                    <div id="container-busca">
                                                        <div id="div-input-busca">
                                                            <input name="inputBusca" id="inputBusca" type="text" class="form-control" placeholder="Digite o nome de uma avaliação">
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
                                                                <th scope="col">Nome</th>
                                                                <th scope="col">Data</th>
                                                                <th scope="col">Visualizar</th>
                                                                <th scope="col">Excluir</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div id="div-table">
                                                    <table class="table table-striped" id="table">
                                                        <tbody>
                                                            <?php
                                                            include '../../Model/sqlSelectAvaliacao.php';
                                                            while ($row_list = pg_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td align="center"> Avaliação <?= $row_list['id_num_avaliacao'] ?></td>
                                                                    <td align="center"><?= $row_list['dt_avaliacao'] ?></td>
                                                                    <td align="center">
                                                                        <form action="visualizarAvaliacao.php" method="POST">
                                                                            <button type="submit" class="btn btn-sm btn-meus-individuos" name="avaliacao-selecionada" value="'<?= $row_list['id_num_avaliacao'] ?>'">
                                                                                <i class="icon ion-md-eye"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                    <td align="center">
                                                                        <form action="../../Model/sqlDeleteAvaliacao.php" method="POST">
                                                                            <button type="button" class="btn btn-sm btn-meus-individuos" data-toggle="modal" data-target="#deleteModal-<?php echo $row_list['id_num_avaliacao'] ?>">
                                                                                <i class="icon ion-md-trash"></i>
                                                                            </button>
                                                                            <!-- Modal HTML -->
                                                                            <div id="deleteModal-<?php echo $row_list['id_num_avaliacao']; ?>" class="modal fade">
                                                                                <div class="modal-dialog modal-confirm">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <div class="icon-box">
                                                                                                <i class="material-icons">&#xE5CD;</i>
                                                                                            </div>
                                                                                            <h4 class="modal-title">Você tem certeza?</h4>

                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>Você realmente deseja deletar a avaliação <?= $row_list['id_num_avaliacao'] ?>? Esse processo não pode ser desfeito.</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                            <button type="submit" class="btn btn-danger" value="<?= $row_list['id_num_avaliacao'] ?>" name="avaliacao-selecionada">Deletar</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                <?php } ?>
                                                                </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer">
                                            <div class="pull-right">
                                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Próximo' />


                                            </div>
                                            <div class="pull-left">
                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- wizard container -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!--  big container -->
            </div>
            <div id="divBotoes" class="center-father">
                <a id="btnVoltar" href="meusIndividuos.php" class="btn btn-dark" role="button">Voltar</a>
            </div>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>







            <div class="relative">
                <div class="footer">
                    © 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
                </div>
            </div>

            <!--COLAPSAR-->
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                        $(".footer").toggleClass('largerFooter');
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#add_row').click(function() {
                        var j = 1;
                        var dataString = "j=" + j;
                        $.ajax({
                            url: "tableRowAvaliacao.php",
                            type: "post",
                            data: dataString,
                            success: function(response) {
                                $('#tab_logic').append(response);
                            }
                        });
                    });
                })
            </script>

            <script>
                $(document).ready(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                    var actions = $("table td:last-child").html();
                    // Delete row on delete button click
                    $(document).on("click", ".delete", function() {
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    });
                });
            </script>

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

            <!--   Core JS Files   -->
            <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

            <!--  Plugin for the Wizard -->
            <script src="js/gsdk-bootstrap-wizard.js"></script>

            <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
            <script src="js/jquery.validate.min.js"></script>

</body>

</html>