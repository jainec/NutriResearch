
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Sobre</title>
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
			
		</div>
	</nav>
	<!-- END nav -->




	<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-6">
					<div class="sub-heading">
						<p class="mb-4" style="text-align: justify;">Essa aplicaçao foi uma ideia oferecida pela professora Dra. <strong>Adicinéia Aparecida de Oliveira</strong> do Departamento de Computação da Universidade Federal de Sergipe e pela professora Dra. <strong>Silvia Maria Vocci</strong> do Departamento de Nutrição da Universidade Federal de Sergipe. A aplicação foi iniciada na disciplina de Engenharia de Sofwtare II do curso de Ciência da Computação e continuada posteriormente.</p>
						
					</div>
				</div>
				
				<div class="col-md-1">
				</div>
				<div class="col-md-5 relative align-self-center">
				<p style="font-size: 30px; color: #F7FAF1;"><strong>Desenvolvedores</strong></p>

					<div id="cards" class="">
						<div style="padding: 0 auto; width: 500px; margin-bottom: 100px;">
							<div class="card mb-3" style="max-width: 540px;">
								<div class="row no-gutters">
									<div class="col-md-3">
										<img style=" margin-left:7px; margin-top: 7px; margin-right:10px;" src="images/eu2.png" class="card-img" alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Jaine Conceição</h5>
											<p class="card-text" style="text-align: justify;">Graduanda em Ciência da Computação na Universidade Federal de Sergipe. Desenvolveu cerca de % do Nutri Research.</p>
											<p class="card-text"><small class="text-muted">E-mail: jayne-conceicao@hotmail.com</small></p>
										</div>
									</div>
								</div>
							</div>

							<div class="card mb-3" style=" width: 100%;">
								<div class="row no-gutters">
									<div class="col-md-3">
										<img style="margin-left:7px; margin-top: 7px;" src="images/raul.jpg" class="card-img" alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">Raul Andrade</h5>
											<p class="card-text" style="text-align: justify;">Graduando em Ciência da Computação na Universidade Federal de Sergipe. Desenvolveu cerca de % do Nutri Research.</p>
											<p class="card-text"><small class="text-muted">E-mail: jayne-conceicao@hotmail.com</small></p>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

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