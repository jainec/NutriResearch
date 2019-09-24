<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


	<title>Interface de Cálculo</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/interfaceCalculo.css" />


</head>

<body>
	<?php

	$display = 'none';
	if (isset($_SESSION['individuo-cadastrado'])) {
		$display = 'block';
		$alerta = "Indivíduo cadastrado com sucesso!";
		$_SESSION['individuo-cadastrado'] = null;
	}
	if (isset($_SESSION['avaliacao-cadastrada'])) {
		$display = 'block';
		$alerta = "Avaliação cadastrada com sucesso!";
		$_SESSION['avaliacao-cadastrada'] = null;
	}
	?>

	<div id="modal" class="modal" tabindex="-1" role="dialog" style="display: <?php echo $display ?>;">
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

	<!--<nav id="nav" class="navbar navbar-expand-lg navbar-light">
		<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
	  		<a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início	</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
  			</button>-->
	<!--<div class="collapse navbar-collapse" id="navbarNav">-->
	<!--<ul class="navbar-nav mr-auto">
      			<li class="nav-item">
        			<a class="nav-link" href="../interface_consulta/buscaAlimento.php">Interface de Busca <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item active">
        			<a class="nav-link" href="../interface_calculo/interfaceCalculo.php">Interface de Cálculo</a>
      			</li>
      		</ul>
			</div>
			<div class="mx-auto order-0 w-100">
        	<a id="liUsuario" class="nav-link" href=""><img src="icons/loginIcon.svg" width="25px">  <?php echo $_SESSION['usuario_nome'] ?></a>
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
	</nav>-->
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
						<h3><strong>Interface de Cálculo</strong></h3>
					</div>
				</div>
			</nav>

			<div class="center-father">
				<div id="board" class="center-child">
					<div class="center-father">
						<div id="divRetanguloTop">
							<div class="divRetanguloTopLeft">
								<a href="meusIndividuos.php" class="hvr-bounce-in" id="iconIndividuos"><img src="icons/group.png" width="99" height="85" title="Indivíduos" alt="Indivíduos"></a>
								<p class="pOpcoesVisualizacao" id="pIndividuos">Visualizar Indivíduos</p>
							</div>
							<div class="divRetanguloTopRight">
								<a href="cadastroIndividuo.php" class="hvr-bounce-in"><img src="icons/addIndividuo.png" width="60" height="60" title="Adicionar Indivíduo" alt="Adicionar Indivíduo"></a>
								<p class="pOpcoesVisualizacao" id="cadastrar-individuo">Cadastrar Indivíduo</p>
							</div>

						</div>
					</div>

					<hr>

					<div class="center-father">
						<div id="divRetanguloTop">
							<div class="divRetanguloTopLeft" id="cadastrar-avaliacao">
								<a href="avaliacaoSelecionarIndividuo.php" class="hvr-bounce-in"><img src="icons/addAvaliacao.png" width="72" height="76" title="Adicionar Avaliação" alt="Adicionar Avaliação"></a>
								<p class="pOpcoesVisualizacao">Cadastrar Avaliação</p>
							</div>
							<div class="divRetanguloTopRight" id="exporta-avaliacoes-div">
								<a href="../../Controller/ExportarAvaliacoes.php"><img src="icons/export.png" id="img-exportar" class="hvr-bounce-in" width="74" height="74" title="Exportar Avaliações" alt="Exportar Avaliações"></a>
								<p class="pOpcoesVisualizacao" id="exportar-avaliacoes">Exportar Avaliações</p>
							</div>

						</div>
					</div>


				</div>
				<div class="relative">
					<div class="footer">
						© 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
					</div>
				</div>
			</div>




			<!--<button id="btnVoltar" type="button" class="btn btn-dark">Voltar</button>-->

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

</body>

</html>