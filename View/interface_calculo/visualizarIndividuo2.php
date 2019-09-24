<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
$_SESSION['id_individuo-selecionado'] = $_POST['individuo-selecionado'];
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
    <title>Visualizar Indivíduo</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel="stylesheet" type="text/css" href="css/visualizarIndividuo.css" />

</head>

<body>

    <div class="wrapper">

        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--<div class="collapse navbar-collapse" id="navbarNav">-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../interface_consulta/buscaAlimento.php">Interface de Busca <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../interface_calculo/interfaceCalculo.php">Interface de Cálculo</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0 w-100">
                <a id="liUsuario" class="nav-link" href=""><img src="icons/loginIcon.svg" width="25px"> <?php echo $_SESSION['usuario_nome'] ?></a>
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


        <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span><a class="a-caminho" href="meusIndividuos.php">Meus Indivíduos</a></span> > <span id="pCaminhoAtual">Visualizar Indivíduo</span></p>
        <hr size="20">

        <div id="divTitulo">
            <h1><strong>Indivíduo</strong></h1>
        </div>

        <div id="div-dados">
            <?php
            include '../../Model/sqlSelectIndividuoPeloId.php';
            $row_list = pg_fetch_assoc($result);

            echo '<h5> <span style="float: left;"><strong>Nome: </strong>' . $row_list['tx_nome'];
            echo '</span><span style="float: right;"> <strong> Data de Nascimento: </strong>' . $row_list['dt_nascimento'] . '</span><br><br>';
            echo '<span style="float: left;"><strong>Sexo: </strong>' . $row_list['tx_sexo'];
            echo '</span><strong>Peso: </strong>' . $row_list['fl_peso'];
            echo '<span style="float: right;"><strong>Altura: </strong>' . $row_list['fl_altura'] . '</span><br><br>';
            echo '<span style="float: left;"> <strong>E-mail: </strong>' . $row_list['tx_email'];
            echo '</span> <span style="float:right;"><strong>Telefone: </strong>' . $row_list['tx_celular'] . '</span></h5><br>';

            ?>
        </div>

        <div id="divTitulo">
            <h1><strong>Avaliações</strong></h1>
        </div>

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
                    </tr>
                </thead>
            </table>
        </div>
        <div id="div-table">
            <table class="table table-striped" id="table">
                <tbody>
                    <?php
                    include '../../Model/sqlSelectAvaliacao.php';
                    while ($row_list = pg_fetch_assoc($result)) {


                        echo '<tr><td align="center"> Avaliação ' . $row_list['id_num_avaliacao'] . '</td> <td align="center">' . $row_list['dt_avaliacao'] . '</td> <td align="center"><form action="visualizarAvaliacao.php" method="POST"><button type="submit" class="btn btn-sm btn-meus-individuos" name="avaliacao-selecionada" value="' . $row_list['id_num_avaliacao'] . '"><i class="icon ion-md-eye"></i></button></form> </td>';
                    }

                    echo  '</tr>';
                    ?>


                </tbody>
            </table>
        </div>

        <div id="divBotoes">
            <a id="btnVoltar" href="interfaceCalculo.php" class="btn btn-dark" role="button">Voltar</a>
        </div>

        <div class="push"></div>
    </div>


    <div class="footer-class">

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