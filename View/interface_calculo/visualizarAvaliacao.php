<?php

session_start();
include '../../Controller/controllerVerificaLogin.php';

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
    <title>Cadastrar Avaliação</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS CDN -->

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>




    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/visualizarAvaliacao.css" />



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
                            <h3><strong>Visualizar Avaliação</strong></h3>
                        </div>
                    </div>

                </div>
            </nav>

            <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span><a class="a-caminho" href="avaliacaoSelecionarIndividuo.php">Selecionar Indivíduo</a></span> > <span id="pCaminhoAtual">Cadastrar Avaliação</span></p>


            <div id="divTitulo"></div>



            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="blue" id="wizard">
                                <form action="../../Model/sqlInsertAvaliacao.php" method="POST" onsubmit="return ValidateDate() && validateAvaliacao();">
                                    <div class="wizard-header">

                                        <div id="divIndividuo">
                                            <?php
                                            include '../../Model/sqlSelectAvaliacaoByIdIndividuo.php';
                                            $row = pg_fetch_array($result);
                                            ?>
                                            <label>
                                                <h5><strong>Indivíduo: <span style="color: #97C447;"><?php echo $row['tx_nome_individuo'] ?></span></strong></h5>
                                            </label>
                                        </div>

                                        <div id="header">
                                            <div id="num-avaliacao">
                                                <label for="input-numero-avaliacao">Número da avaliação:</label>
                                                <?= $row['id_num_avaliacao'] ?>
                                            </div>

                                            <div id="data-avaliacao">
                                                <label for="inputData">Data da Avaliação:</label>
                                                <?= $row['dt_avaliacao'] ?>
                                            </div>

                                            <div id="dia-avaliacao">
                                                <label for="selectSemana">Dia da semana:</label>
                                                <?= $row['tx_descrica_dia_da_semana'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#cafe-manha" data-toggle="tab">Café da manhã</a></li>
                                            <li><a href="#lanche-manha" data-toggle="tab">Lanche da manhã</a></li>
                                            <li><a href="#almoco" data-toggle="tab">Almoço</a></li>
                                            <li><a href="#lanche-tarde" data-toggle="tab">Lanche da tarde</a></li>
                                            <li><a href="#jantar" data-toggle="tab">Jantar</a></li>
                                            <li><a href="#ceia" data-toggle="tab">Ceia</a></li>

                                        </ul>
                                    </div>

                                    <div id="board-content" class="tab-content">
                                        <div class="tab-pane" id="cafe-manha">
                                            <div class="row">

                                                <table class="table table-striped">
                                                    <tbody id="tab_logic1">
                                                        <?php
                                                        include '../../Model/sqlSelectAvaliacaoCafeDaManha.php';
                                                        while ($row = pg_fetch_array($result)) { ?>
                                                            <tr id="addr0">
                                                                <td>
                                                                    <div id="divAvaliacoes">

                                                                        <div id="" class="form-group">
                                                                            <label for="horario">Horário:</label>
                                                                            <?= $row['tm_horario'] ?>
                                                                        </div>
                                                                </td>


                                                                <td>
                                                                    <div id="" class="form-group">
                                                                        <label for="inputAlimento">Alimento:</label>
                                                                        <?= $row['tx_nome_alimento'] ?>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div id="" class="form-group">
                                                                        <label>Medida:</label>
                                                                        <?= $row['tx_descricao_medida'] ?>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div id="">
                                                                        <label for="inputQntd">Quantidade:</label>
                                                                        <?= $row['fl_quantidade'] ?>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div id="" class="form-group">
                                                                        <label for="local">Local da refeição:</label>
                                                                        <?= $row['tx_local_refeicao'] ?>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div id="" class="form-group">
                                                                        <label for="marca">Marca:</label>
                                                                        <?= $row['tx_marca'] ?>
                                                                    </div>
                                            </div>
                                            </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        </table>

                                        <div class="center-father">
                                            <div id="divAdd" class="center-child">
                                                <!--<img id="add_row" src="icons/addIcon.svg" width="27px;" onclick="addRow(1)">Add comida-->

                                            </div>
                                        </div>


                                        </div>
                                    </div>

                                    <div class="tab-pane" id="lanche-manha">
                                        <table class="table table-striped">
                                            <tbody id="tab_logic2">
                                                <?php
                                                include '../../Model/sqlSelectAvaliacaoLancheManha.php';
                                                while ($row = pg_fetch_array($result)) { ?>
                                                    <tr id="addr0">
                                                        <td>
                                                            <div id="divAvaliacoes">

                                                                <div id="" class="form-group">
                                                                    <label for="horario">Horário:</label>
                                                                    <?= $row['tm_horario'] ?>
                                                                </div>
                                                        </td>


                                                        <td>
                                                            <div id="" class="form-group">
                                                                <label for="inputAlimento">Alimento:</label>
                                                                <?= $row['tx_nome_alimento'] ?>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div id="" class="form-group">
                                                                <label>Medida:</label>
                                                                <?= $row['tx_descricao_medida'] ?>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div id="">
                                                                <label for="inputQntd">Quantidade:</label>
                                                                <?= $row['fl_quantidade'] ?>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div id="" class="form-group">
                                                                <label for="local">Local da refeição:</label>
                                                                <?= $row['tx_local_refeicao'] ?>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div id="" class="form-group">
                                                                <label for="marca">Marca:</label>
                                                                <?= $row['tx_marca'] ?>
                                                            </div>
                                    </div>
                                    </td>

                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>

                                <div class="center-father">
                                    <div id="divAdd" class="center-child">

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="almoco">
                                <table class="table table-striped">
                                    <tbody id="tab_logic3">
                                        <?php
                                        include '../../Model/sqlSelectAvaliacaoAlmoco.php';
                                        while ($row = pg_fetch_array($result)) { ?>
                                            <tr id="addr0">
                                                <td>
                                                    <div id="divAvaliacoes">

                                                        <div id="" class="form-group">
                                                            <label for="horario">Horário:</label>
                                                            <?= $row['tm_horario'] ?>
                                                        </div>
                                                </td>


                                                <td>
                                                    <div id="" class="form-group">
                                                        <label for="inputAlimento">Alimento:</label>
                                                        <?= $row['tx_nome_alimento'] ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="" class="form-group">
                                                        <label>Medida:</label>
                                                        <?= $row['tx_descricao_medida'] ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="">
                                                        <label for="inputQntd">Quantidade:</label>
                                                        <?= $row['fl_quantidade'] ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="" class="form-group">
                                                        <label for="local">Local da refeição:</label>
                                                        <?= $row['tx_local_refeicao'] ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="" class="form-group">
                                                        <label for="marca">Marca:</label>
                                                        <?= $row['tx_marca'] ?>
                                                    </div>
                            </div>
                            </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                        <div class="center-father">
                            <div id="divAdd" class="center-child">

                            </div>
                        </div>

                        </div>

                        <div class="tab-pane" id="lanche-tarde">
                            <table class="table table-striped">
                                <tbody id="tab_logic4">
                                    <?php
                                    include '../../Model/sqlSelectAvaliacaoLancheTarde.php';
                                    while ($row = pg_fetch_array($result)) { ?>
                                        <tr id="addr0">
                                            <td>
                                                <div id="divAvaliacoes">

                                                    <div id="" class="form-group">
                                                        <label for="horario">Horário:</label>
                                                        <?= $row['tm_horario'] ?>
                                                    </div>
                                            </td>


                                            <td>
                                                <div id="" class="form-group">
                                                    <label for="inputAlimento">Alimento:</label>
                                                    <?= $row['tx_nome_alimento'] ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div id="" class="form-group">
                                                    <label>Medida:</label>
                                                    <?= $row['tx_descricao_medida'] ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div id="">
                                                    <label for="inputQntd">Quantidade:</label>
                                                    <?= $row['fl_quantidade'] ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div id="" class="form-group">
                                                    <label for="local">Local da refeição:</label>
                                                    <?= $row['tx_local_refeicao'] ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div id="" class="form-group">
                                                    <label for="marca">Marca:</label>
                                                    <?= $row['tx_marca'] ?>
                                                </div>
                        </div>
                        </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>

                    <div class="center-father">
                        <div id="divAdd" class="center-child">

                        </div>
                    </div>

                    </div>

                    <div class="tab-pane" id="jantar">
                        <table class="table table-striped">
                            <tbody id="tab_logic5">
                                <?php
                                include '../../Model/sqlSelectAvaliacaoJantar.php';
                                while ($row = pg_fetch_array($result)) { ?>
                                    <tr id="addr0">
                                        <td>
                                            <div id="divAvaliacoes">

                                                <div id="" class="form-group">
                                                    <label for="horario">Horário:</label>
                                                    <?= $row['tm_horario'] ?>
                                                </div>
                                        </td>


                                        <td>
                                            <div id="" class="form-group">
                                                <label for="inputAlimento">Alimento:</label>
                                                <?= $row['tx_nome_alimento'] ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div id="" class="form-group">
                                                <label>Medida:</label>
                                                <?= $row['tx_descricao_medida'] ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div id="">
                                                <label for="inputQntd">Quantidade:</label>
                                                <?= $row['fl_quantidade'] ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div id="" class="form-group">
                                                <label for="local">Local da refeição:</label>
                                                <?= $row['tx_local_refeicao'] ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div id="" class="form-group">
                                                <label for="marca">Marca:</label>
                                                <?= $row['tx_marca'] ?>
                                            </div>
                    </div>
                    </td>

                    </tr>
                <?php } ?>
                </tbody>
                </table>

                <div class="center-father">
                    <div id="divAdd" class="center-child">

                    </div>
                </div>

                </div>

                <div class="tab-pane" id="ceia">
                    <table class="table table-striped">
                        <tbody id="tab_logic6">
                            <?php
                            include '../../Model/sqlSelectAvaliacaoCeia.php';
                            while ($row = pg_fetch_array($result)) { ?>
                                <tr id="addr0">
                                    <td>
                                        <div id="divAvaliacoes">

                                            <div id="" class="form-group">
                                                <label for="horario">Horário:</label>
                                                <?= $row['tm_horario'] ?>
                                            </div>
                                    </td>


                                    <td>
                                        <div id="" class="form-group">
                                            <label for="inputAlimento">Alimento:</label>
                                            <?= $row['tx_nome_alimento'] ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div id="" class="form-group">
                                            <label>Medida:</label>
                                            <?= $row['tx_descricao_medida'] ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div id="">
                                            <label for="inputQntd">Quantidade:</label>
                                            <?= $row['fl_quantidade'] ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div id="" class="form-group">
                                            <label for="local">Local da refeição:</label>
                                            <?= $row['tx_local_refeicao'] ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div id="" class="form-group">
                                            <label for="marca">Marca:</label>
                                            <?= $row['tx_marca'] ?>
                                        </div>
                </div>
                </td>

                </tr>
            <?php } ?>
            </tbody>
            </table>

            <div class="center-father">
                <div id="divAdd" class="center-child">

                </div>
            </div>

            </div>
        </div>

        <div class="wizard-footer">
            <div class="pull-right">
                <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Próximo' />
            </div>
            <div class="pull-left">
                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Voltar' />
            </div>
            <div class="clearfix"></div>
        </div>

        </form>
    </div>
    </div> <!-- wizard container -->
    </div>
    </div> <!-- row -->
    </div> <!--  big container -->


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

    <script type="text/javascript">
        function validateAvaliacao() {
            if ($('#selectRefeicao').length > 0) {
                return true
            } else {
                alert("O indivíduo deve ter feito pelo menos uma refeição para prosseguir.");
                return false;
            }
        }
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

    <script type="text/javascript">
        function addRow(id_row) {
            var j = 1;
            var dataString = "j=" + j;
            $.ajax({
                url: "tableRowAvaliacao" + id_row + ".php",
                type: "post",
                data: dataString,
                success: function(response) {
                    $('#tab_logic' + id_row).append(response);
                }
            });
        }
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
        function ValidateDate() {
            //Get the date from the TextBox.
            var dateString = document.getElementById("inputData").value;
            var regex = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g;

            //Check whether valid dd/MM/yyyy Date Format.
            if (regex.test(dateString)) {
                return true;

            } else {
                alert("Por favor, insira uma data no formato dd/mm/yyyy válida.");
                return false;
            }
        }
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