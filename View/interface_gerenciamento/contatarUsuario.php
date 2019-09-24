<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
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

    <title>Contatar Usuário</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel="stylesheet" type="text/css" href="css/contatarUsuario.css" />

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
                        <h3><strong>Contatar Usuário</strong></h3>
                    </div>
                </div>
            </nav>


            <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Gerenciamento</a></span> > <span id="pCaminhoAtual">Contatar Usuário</span></p>

            <div id="divTitulo">
                <h1><strong></strong></h1>
            </div>

            <div class="center-father">
                <div id="board" class="center-child">

                    <h5 style="margin-top: 30px;">Todos os Usuários</h5>


                    <form autocomplete="off" id="form-search" name="" action="avaliacaoSelecionarIndividuo.php" method="POST">

                        <div id="container-busca">
                            <div id="div-input-busca">
                                <input name="inputBusca" id="inputBusca" type="text" class="form-control" placeholder="Digite o nome de um usuário">
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
                                    <th id="th-nome" scope="col">Nome</th>
                                    <th td="th-icon" scope="col">Contatar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="div-table">
                        <table class="table table-striped" id="table">
                            <tbody>
                                <?php
                                include '../../Model/sqlSelectUsuarios.php';
                                while ($row_list = pg_fetch_assoc($result_usuarios)) {
                                    ?>

                                    <tr>
                                        <td id="td-nome">
                                            <?= $row_list['tx_nome'] ?>
                                        </td>
                                        <td id="td-icon" align="center">
                                            <form action="enviarEmailParaUsuario.php" method="POST">
                                                <button type="submit" class="btn btn-sm btn-meus-individuos" value="<?= $row_list['id_usuario'] ?>" name="usuario-selecionado">
                                                    <i class="fas fa-envelope"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="divBotoes" class="">
                <a id="btnVoltar" href="interfaceGerenciamento.php" class="btn btn-dark" role="button">Voltar</a>
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