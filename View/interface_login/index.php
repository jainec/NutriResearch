<?php
session_start();

$display = 'none';
$alerta = '';

// erro de senhas e emails diferentes
if (isset($_SESSION['alerta'])) {
	$display = 'block';
	$alerta = $_SESSION['alerta'];
	$_SESSION['alerta'] = null;
}

// erro de email ja existir
if (isset($_SESSION['nao_cadastrado'])) {
	$display = 'block';
	$alerta = 'O e-mail utilizado ja foi cadastrado!';
}
unset($_SESSION['nao_cadastrado']);

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
				<div class="col-md-6">
					<h2 class="heading mb-3">Nutri Research</h2>
					<div class="sub-heading">
						<p class="mb-4" style="text-align: justify;">O Nutri Research é um sistema on-line de buscas. Através dele você consegue encontrar a composição de diversos alimentos. Você também pode fazer avaliações alimentares on-line.</p>
						<p class="mb-5"><a class="btn-black btn-success btn-lg pb_btn-pill smoothscroll" href="login.php"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Fazer Login</span></a></p>
					</div>
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-5 relative align-self-center">
					<form name="form" method="POST" action="../../Controller/controllerCadastroNoSistema.php" class="bg-white rounded pb_form_v1">
						<h2 class="mb-4 mt-0 text-center">Cadastre-se</h2>
						<div class="form-group">
							<input type="text" class="form-control pb_height-50 reverse" name="nome" placeholder="Nome completo" required value='<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>'>
						</div>
						<div class="form-group">
							<input type="email" class="form-control pb_height-50 reverse" name="email1" maxlength="45" value='<?php echo isset($_POST['email1']) ? $_POST['email1'] : ''; ?>' placeholder="E-mail" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control pb_height-50 reverse" name="email2" maxlength="45" placeholder="Confirmar e-mail" required>
						</div>
						<div class="form-group margin-bottom">
							<div>
								<input type="password" maxlength="45" pattern=".{8,}" required title="A senha deve conter no mínimo 8 caracteres." class="form-control pb_height-50 reverse senha" name="senha1" placeholder="Senha" required style="margin-right: 34px;">
							</div>
							<div>
								<input type="password" maxlength="45" pattern=".{8,}" required title="A senha deve conter no mínimo 8 caracteres." class="form-control pb_height-50 reverse senha" name="senha2" placeholder="Confirmar senha" required>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="registrar" class="btn-white btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Registrar">
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