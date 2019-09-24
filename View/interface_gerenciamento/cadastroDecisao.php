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
	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<title>Cadastrar Decisão</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/cadastroDecisao.css" />

</head>

<body>

	<?php

	$displayError = 'none';
	if (isset($_SESSION['medida-caseira-alimento'])) {
		$displayError = 'block';
		$alerta = "Essa medida caseira já foi cadastrada para esse alimento!";
		$_SESSION['medida-caseira-alimento'] = null;
	}
	?>

	<div id="modal" class="modal" tabindex="-1" role="dialog" style="display: <?php echo $displayError ?>;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><?php echo $alerta; ?></h5>
					<button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<img width="40px;" src="icons/error.svg" style="margin-right: 35%;">
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
						Jaine Conceição
					</a>
				</li>
				<li>
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
				<li class="active">
					<a href="#">
						<i class="fas fa-user-cog"></i>
						Interface de Gerenciamento
					</a>
				</li>
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
					<a href="#">
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
						<h3><strong>Cadastrar Decisão</strong></h3>
					</div>
				</div>
			</nav>


			<p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceGerenciamento.php">Interface de Gerenciamento</a></span> > <span id="pCaminhoAtual">Cadastrar Decisão</span></p>


			<div id="divTitulo">

			</div>

			<div class="center-father">
				<div id="board" class="center-child">

					<div id="divForm">
						<form action="../../Model/sqlInsertDecisao.php" method="POST">
							<table>
								<tr>
									<td>
										<label for="rotulo">Rótulo de busca da decisão<span style="color: red;">*</span></label>
										<input type="text" class="form-control" id="rotulo" name="rotulo" placeholder="" required="yes">
									</td>
								</tr>
								<tr>

									<td>
										<label for="alimento">Essa decisão está relacionada com algum alimento cadastrado no sistema?<span style="color: red;">*</span></label>
										<input type="radio" name="options" id="option1" autocomplete="off" checked value=1> Sim
										<input type="radio" name="options" id="option2" autocomplete="off" checked value=2> Não
										<div id="divAlimento" style="display: none;">
											<label for="alimento">Qual alimento?<span style="color: red;">*</span></label>
											<select id="alimento" class="form-control" name="alimentos[]" >
										</div>
										<?php

										include '../../Model/sqlSelectAlimentoDropDown.php';
										while ($row_list = pg_fetch_assoc($result)) {
											?>
											<option value="<?= $row_list['id_alimento'] ?>">
												<?= $row_list['tx_nome'] ?>
											</option>
										<?php
										}
										?>

										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label for="decisao">Decisão<span style="color: red;">*</span></label>
										<div class="form-group">
											<textarea class="form-control" name="decisao" id="decisao" rows="4" required></textarea>
										</div>
									</td>
								</tr>
							</table>
							<small style="color: red;">* Campos Obrigatórios</small>
							<div id="divBotoes">
								<button id="btnConfirmar" type="submit" class="btn">Salvar</button>
								<!--<a id="btnVoltar" href="interfaceCalculo.php" class="btn btn-dark" role="button">Voltar</a>-->
								<input name="Voltar" id="btnVoltar" type="button" class="btn btn-dark m-3" Value="Voltar" onclick="goBack()" />
							</div>
						</form>
					</div>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
						$('#sidebarCollapse').on('click', function() {
							$('#sidebar').toggleClass('active');
						});
					});
				</script>

				<script type="text/javascript">
					$('#option1').on('click', function() {
						$('#divAlimento').css('display', 'block');
						$('#board').css('height', '550px');
					});
				</script>

				<script type="text/javascript">
					$('#option2').on('click', function() {
						$('#divAlimento').css('display', 'none');
						$('#board').css('height', '460px');
					});
				</script>

				<script>
					function goBack() {
						window.history.back();
					}
				</script>
			</div>
		</div>


</body>

</html>