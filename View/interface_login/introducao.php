<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nutri Research</title>
    <meta name="description" content="Free Bootstrap 4 Template by uicookies.com">
    <meta name="keywords" content="Free website templates, Free bootstrap themes, Free template, Free bootstrap, Free website template">

    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

    <link rel="stylesheet" href="css/css-index/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/law-icons/font/flaticon.css">

    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/css-index/slick.css">
    <link rel="stylesheet" href="css/css-index/slick-theme.css">

    <link rel="stylesheet" href="css/css-index/helpers.css">
    <link rel="stylesheet" href="css/css-index/style.css">
    <link rel="stylesheet" href="css/css-index/landing-2.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


</head>

<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">

    <!-- Exibirá com condicao -->
    <div id="modal" class="modal" tabindex="-1" role="dialog" style="display: <?= $display ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <?= $alerta ?>
                    </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <img width="50px;" src="icons/error.png" style="margin-right: 35%;">
                    <button id="btn-ok" type="button" class="btn close-modal" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
        <div class="container">
            <a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início</a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="ion-navicon"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="probootstrap-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a target="_blank" class="nav-link" href="sobreLandingPage.php">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../Controller/controllerLogout.php">Sair<i class="fas fa-sign-out-alt" style="margin-left: 5px;"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->




    <section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <h2 class="heading mb-3">Nutri Research</h2>
                    <div class="sub-heading">
                        <p class="mb-4" style="text-align: justify;">Olá, <?php Print "<strong>" . $_SESSION['usuario_nome'] . "</strong>" ?>! Seja bem-vindo(a) ao Nutri Research. Para acessar o sistema você pode utilizar o botão abaixo.</p>
                        <p class="mb-5"><a class="btn-black btn-success btn-lg pb_btn-pill smoothscroll" href="../interface_consulta/buscaAlimento.php"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Acessar</span></a></p>
                        <hr>
                        <ul>
                            <li>
                                <span class="lead">Você pode acessar o manual do usuário clicando
                                    <a target="_blank" href="../../Manual_do_usuario_Nutri_Research.pdf" class="a-introducao">aqui</a>.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-5 relative align-self-center">
                    <img width="420" src="icons/tomat.gif" style="margin-left: 60px; margin-bottom: 80px;">
                    <!--<img style="margin-right:20px;" src="icons/intro.gif">-->

                </div>
            </div>
        </div>
    </section>
    <!-- END section -->




    <footer class="pb_footer bg-light" role="contentinfo">
        <div class="container">
            <div class="row text-center">

            </div>
            <div class="row">
                <div class="col text-center">
                    <p class="pb_font-14">&copy; 2019 Copyright | Jaine Conceição e Raul Andrade. <br> Page Designed by <a href="https://uicookies.com/">uiCookies.com</a> </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#88B43A" /></svg></div>


    <script src="js/jquery.min.js"></script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



    <!-- Script jquery -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.close-modal').on('click', function(event) {
                jQuery('#modal').toggle('show');
            });
        });
    </script>

</body>

</html>