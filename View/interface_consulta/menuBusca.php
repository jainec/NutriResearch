<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
include '../../Model/conexao_bd.php';
include '../../Model/sqlAlimentoBuscado.php';
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<title>Menu de Busca</title>

	<link rel="icon" href="icons/nutri_logo3.png">

	<link rel="stylesheet" type="text/css" href="css/menuBusca.css" />

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
					<a href="../interface_login/meuPerfil.php">
						<i class="fas fa-user"></i>
						<?php echo $_SESSION['usuario_nome'] ?>
					</a>
				</li>
				<li class="active">
					<a href="../interface_consulta/buscaAlimento.php" data-toggle="collapse">
						<i class="fas fa-search"></i>
						Interface de Busca
					</a>
				</li>
				<li>
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
					<a href="../interface_gerenciamento/dicionarioDecisoes.php">
						<i class="fas fa-book"></i>
						Dicionário de Decisões
					</a>
				</li>
			</ul>
			<ul>
				<li>
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

		<!-- Page Content  -->
		<div id="content">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fas fa-align-left"></i>
					</button>
					<div id="tittle">
						<h3><strong><?php echo $_SESSION['nome_alimento']; ?></strong></h3>
					</div>
				</div>
			</nav>

			<p id="pCaminho">Você está em <span><a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a> </span> <span> > <span id="pCaminhoAtual">Menu Alimento</span></p>

			<div id="divTitulo"></div>

			<div class="center-father">
				<div id="board" class="center-child">
					<div class="center-father">
						<div id="divRetanguloTop">
							<div class="divRetanguloTopLeft">
								<a href="composicaoAlimento.php" class="hvr-bounce-in"><img src="icons/composicao.png" width="82" height="76" title="Composição" alt="Composição"></a>
								<p class="pOpcoesVisualizacao">Composição</p>
							</div>
							<div class="divRetanguloTopRight">
								<a href="medidasCaseiras.php" class="hvr-bounce-in"><img src="icons/medidas.png" width="87" height="76" title="Medidas" alt="Medidas"></a>
								<p class="pOpcoesVisualizacao">Medidas Caseiras</p>
							</div>

						</div>
					</div>

					<hr>

					<div class="center-father">
						<div id="divRetanguloTop">
							<div class="divRetanguloTopLeft">
								<a href="receitaAlimento.php" class="hvr-bounce-in"><img src="icons/recipe.png" width="72" height="76" title="Receita" alt="Receita"></a>
								<p class="pOpcoesVisualizacao">Receita</p>
							</div>
							<div class="divRetanguloTopRight">
								<a href="decisoesAlimento.php" class="hvr-bounce-in"><img src="icons/decisao.png" width="82" height="76" title="Decisões" alt="Decisões"></a>
								<p class="pOpcoesVisualizacao">Decisões</p>
							</div>

						</div>
					</div>

				</div>
			</div>
			<div class="">
				<a id="btnVoltar" href="buscaAlimento.php" class="btn btn-dark" role="button">Voltar</a>
			</div>

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


</body>

</html>