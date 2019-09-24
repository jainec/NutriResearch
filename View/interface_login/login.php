<?php
session_start();

$display = 'none';
$alerta = '';

// logica de email ou senha errados
if (isset($_SESSION['nao_autenticado'])) {
    $display = 'block';
    $alerta = 'Por favor, verifique se o e-mail e senha estão corretos!';
}
unset($_SESSION['nao_autenticado']);

$lembrete = (isset($_SESSION['lembrete'])) ? $_SESSION['lembrete'] : '';
$checked = ($lembrete == 'sim') ? 'checked' : '';

//nao era pra ficar aqui, porem o cookie nao consegue acessar outros diretorios
//logica do lembrar senha e email
if ($lembrete == 'sim') {
    $expira = time() + 60 * 60 * 24 * 30;
    setCookie('CookieLembrete', 'sim', $expira);
    setCookie('CookieEmail', $_SESSION['email'], $expira);
    setCookie('CookieSenha', $_SESSION['senha'], $expira);
} else {
    setCookie('CookieLembrete');
    setCookie('CookieEmail');
    setCookie('CookieSenha');
}
//o ideal seria criptografado
$email = (isset($_COOKIE['CookieEmail'])) ? $_COOKIE['CookieEmail'] : '';
$senha = (isset($_COOKIE['CookieSenha'])) ? $_COOKIE['CookieSenha'] : '';
$lembrete = (isset($_COOKIE['CookieLembrete'])) ? $_COOKIE['CookieLembrete'] : '';

//var_dump($_COOKIE);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Fazer Login</title>
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
            <a class="navbar-brand" href="index.php">Início</a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="ion-navicon"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="probootstrap-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="sobreLandingPage.php">Sobre</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->




    <section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-md-1">
                </div>
                <div class="col-md-5 relative align-self-center">
                    <form name="form" method="POST" action="../../Controller/controllerLogin.php" class="bg-white rounded pb_form_v1">
                        <h2 class="mb-4 mt-0 text-center">Fazer Login</h2>

                        <div class="form-group">
                            <input type="email" class="form-control pb_height-50 reverse" maxlength="45" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control pb_height-50 reverse" maxlength="45" name="senha" placeholder="Senha" required style="margin-right: 34px;">
                        </div>
                        <div class="form-group form-check">
                            <input name="lembrete" type="checkbox" class="form-check-input" id="exampleCheck1" 
                            value="sim" <?=$checked?> >
                            <label class="form-check-label" for="exampleCheck1">Lembrar senha</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="entrar" class="btn-white btn btn-primary btn-lg btn-block pb_btn-pill btn-shadow-blue" value="Logar">
                        </div>
                        <div class="form-group">
                            <label>Não tem uma conta? <a id="a-registrese" href="index.php"><span >Registre-se</span></a> </label>
                        </div>
                    </form>

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