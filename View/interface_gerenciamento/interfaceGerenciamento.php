<?php

session_start();
include '../../Controller/controllerVerificaLogin.php';
include '../../Controller/controllerVerificaGestor.php';

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
    <title>Interface de Gerenciamento</title>
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
    <link rel="stylesheet" type="text/css" href="css/interfaceGerenciamento.css" />




</head>

<body>

    <?php
    $displaySuccess = 'none';
    if (isset($_SESSION['medida-cadastrada'])) {
        $displaySuccess = 'block';
        $alerta = "Medida Caseira cadastrada com sucesso!";
        $_SESSION['medida-cadastrada'] = null;
    } 
    if (isset($_SESSION['fonte-cadastrada'])) {
        $displaySuccess = 'block';
        $alerta = "Fonte cadastrada com sucesso!";
        $_SESSION['fonte-cadastrada'] = null;
    } 
    if (isset($_SESSION['nutriente-cadastrado'])) {
        $displaySuccess = 'block';
        $alerta = "Nutriente cadastrado com sucesso!";
        $_SESSION['nutriente-cadastrado'] = null;
    } 
    if (isset($_SESSION['alimento-cadastrado'])) {
        $displaySuccess = 'block';
        $alerta = "Alimento cadastrado com sucesso!";
        $_SESSION['alimento-cadastrado'] = null;
    } 

    if (isset($_SESSION['email-enviado'])) {
        $displaySuccess = 'block';
        $alerta = "E-mail enviado com sucesso!";
        $_SESSION['email-enviado'] = null;
    } 

    if (isset($_SESSION['medida-caseira-alimento'])) {
        $displaySuccess = 'block';
        $alerta = "Medida Caseira para Alimento cadastrada com sucesso!";
        $_SESSION['medida-caseira-alimento'] = null;
    } 

    if (isset($_SESSION['decisao-cadastrada'])) {
        $displaySuccess = 'block';
        $alerta = "Decisão cadastrada com sucesso!";
        $_SESSION['decisao-cadastrada'] = null;
    } 

    if (isset( $_SESSION['alimento-receita-cadastrado'])) {
        $displaySuccess = 'block';
        $alerta = "Alimento-Receita cadastrado com sucesso!";
        $_SESSION['alimento-receita-cadastrado'] = null;
    } 

    if (isset($_SESSION['fonte-atualizada'])) {
        $displaySuccess = 'block';
        $alerta = "Fonte atualizada com sucesso!";
        $_SESSION['fonte-atualizada'] = null;
    } 

    if (isset($_SESSION['medida-atualizada'])) {
        $displaySuccess = 'block';
        $alerta = "Medida Caseira atualizada com sucesso!";
        $_SESSION['medida-atualizada'] = null;
    } 
    
    if (isset($_SESSION['nutriente-atualizado'])) {
        $displaySuccess = 'block';
        $alerta = "Nutriente atualizado com sucesso!";
        $_SESSION['nutriente-atualizado'] = null;
    } 

    if (isset($_SESSION['decisao-atualizada'])) {
        $displaySuccess = 'block';
        $alerta = "Decisão atualizada com sucesso!";
        $_SESSION['decisao-atualizada'] = null;
    } 

    if (isset($_SESSION['medida-caseira-alimento-atualizada'])) {
        $displaySuccess = 'block';
        $alerta = "Medida Caseira para Alimento atualizada com sucesso!";
        $_SESSION['medida-caseira-alimento-atualizada'] = null;
    } 

    if (isset($_SESSION['alimento-atualizado'])) {
        $displaySuccess = 'block';
        $alerta = "Alimento atualizado com sucesso!";
        $_SESSION['alimento-atualizado'] = null;
    } 

    if (isset($_SESSION['alimento-receita-atualizado'])) {
        $displaySuccess = 'block';
        $alerta = "Alimento-Receita atualizado com sucesso!";
        $_SESSION['alimento-receita-atualizado'] = null;
    } 

    ?>

    <div id="modal" class="modal" tabindex="-1" role="dialog" style="display: <?php echo $displaySuccess ?>;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $alerta; ?></h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <img width="40px;" src="icons/success-icon.png" style="margin-right: 35%;">
                    <button id="btn-ok" type="button" class="btn close-modal" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.close-modal').on('click', function(event) {
                jQuery('#modal').toggle('show');
            });
        });
    </script>

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
                    <li class="">
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
                        <li class="active">
                            <a href="../interface_gerenciamento/interfaceGerenciamento.php">
                                <i class="fas fa-user-cog"></i>
                                Interface de Gerenciamento
                            </a>
                        </li>
                    <?php } ?>
                    <li class="">
                        <a href="dicionarioDecisoes.php">
                            <i class="fas fa-book"></i>
                            Dicionário de Decisões
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="">
                        <a href="../interface_login/sobre.php">
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
                            <h3><strong>Interface de Gerenciamento</strong></h3>
                        </div>
                    </div>

                </div>
            </nav>



            <div id="divTitulo"></div>



            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="blue" id="wizard">
                                <form action="" method="">
                                    <!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->


                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#cadastros" data-toggle="tab">Cadastros</a></li>
                                            <li><a href="#edicoes" data-toggle="tab">Edições</a></li>
                                            <li><a href="#inativacoes" data-toggle="tab">Inativações</a></li>
                                            <li><a href="#usuarios" data-toggle="tab">Usuários</a></li>

                                        </ul>
                                    </div>

                                    <div id="board-content" class="tab-content">
                                        <div class="tab-pane" id="cadastros">

                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="cadastroAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Alimento" alt="Cadastrar Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar<br>Alimento</p>
                                                    </td>
                                                    <td>
                                                        <a href="cadastroAlimentoReceita.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Alimento-Receita" alt="Cadastrar Alimento-Receita"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar <br>Alimento-Receita</p>
                                                    </td>
                                                    <td>
                                                        <a href="cadastroNutriente.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Nutriente" alt="Cadastrar Nutriente"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar<br>Nutriente</p>
                                                    </td>
                                                    <td>
                                                        <a href="cadastroMedidaCaseira.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Medida Caseira" alt="Cadastrar Medida Caseira"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar<br>Medida Caseira</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="cadastroFonte.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Fonte" alt="Cadastrar Fonte"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar<br>Fonte</p>
                                                    </td>
                                                    <td>
                                                        <a href="cadastroDecisao.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Decisão" alt="Cadastrar Decisão"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar<br>Decisão</p>
                                                    </td>
                                                    <td>
                                                        <a href="cadastroMedidaCaseiraParaAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Cadastrar Medida Caseira para Alimento" alt="Cadastrar Medida Caseira para Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Cadastrar Medida<br>Caseira para Alimento</p>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="edicoes">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="edicaoAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Alimento" alt="Editar Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Editar<br>Alimento</p>
                                                    </td>
                                                    <td>
                                                        <a href="edicaoAlimentoReceita.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Alimento-Receita" alt="Editar Alimento-Receita"></a>
                                                        <p class="pOpcoesVisualizacao">Editar <br>Alimento-Receita</p>
                                                    </td>
                                                    <td>
                                                        <a href="edicaoNutriente.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Nutriente" alt="Editar Nutriente"></a>
                                                        <p class="pOpcoesVisualizacao">Editar<br>Nutriente</p>
                                                    </td>
                                                    <td>
                                                        <a href="edicaoMedidaCaseira.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Medida Caseira" alt="Editar Medida Caseira"></a>
                                                        <p class="pOpcoesVisualizacao">Editar<br>Medida Caseira</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="edicaoFonte.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Fonte" alt="Editar Fonte"></a>
                                                        <p class="pOpcoesVisualizacao">Editar<br>Fonte</p>
                                                    </td>
                                                    <td>
                                                        <a href="edicaoDecisao.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Decisão" alt="Editar Decisão"></a>
                                                        <p class="pOpcoesVisualizacao">Editar<br>Decisão</p>
                                                    </td>
                                                    <td>
                                                        <a href="edicaoMedidaCaseiraParaAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Editar Medida Caseira para Alimento" alt="Editar Medida Caseira para Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Editar Medida<br>Caseira para Alimento</p>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="inativacoes">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="inativacaoAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Inativar Alimento" alt="Inativar Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Inativar<br>Alimento</p>
                                                    </td>
                                                    <td>
                                                        <a href="inativacaoNutriente.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Inativar Nutriente" alt="Inativar Nutriente"></a>
                                                        <p class="pOpcoesVisualizacao">Inativar<br>Nutriente</p>
                                                    </td>
                                                    <td>
                                                        <a href="inativacaoDecisao.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Inativar Decisão" alt="Inativar Decisão"></a>
                                                        <p class="pOpcoesVisualizacao">Inativar<br>Decisão</p>
                                                    </td>
                                                    <td>
                                                        <a href="inativacaoMedidaCaseiraDeAlimento.php" class="hvr-bounce-in"><img src="icons/add-goods.png" width="77" height="82" title="Inativar Medida Caseira de Alimento" alt="Inativar Medida Caseira de Alimento"></a>
                                                        <p class="pOpcoesVisualizacao">Inativar Medida<br>Caseira de Alimento</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="usuarios">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="visualizarUsuarios.php" class="hvr-bounce-in"><img src="icons/view-user.png" width="77" height="82" title="Visualizar Usuários do Sistema"></a>
                                                        <p class="pOpcoesVisualizacao">Visualizar Usuários<br>do Sistema</p>
                                                    </td>
                                                    <td>
                                                        <a href="contatarUsuario.php" class="hvr-bounce-in"><img src="icons/contact-user.png" width="77" height="82" title="Contatar Usuário"></a>
                                                        <p class="pOpcoesVisualizacao">Contatar<br>Usuário</p>
                                                    </td>
                                                    <td>
                                                        <a href="atribuirAdmUsuario.php" class="hvr-bounce-in"><img src="icons/admin-user.png" width="77" height="82" title="Atribuir adm. a um usuário"></a>
                                                        <p class="pOpcoesVisualizacao">Atribuir adm.<br>a um usuário</p>
                                                    </td>
                                                    <td>
                                                        <a href="removerUsuario.php" class="hvr-bounce-in"><img src="icons/remove-user.png" width="77" height="82" title="Remover Usuário do Sistema"></a>
                                                        <p class="pOpcoesVisualizacao">Remover Usuário<br>do Sistema</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">

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