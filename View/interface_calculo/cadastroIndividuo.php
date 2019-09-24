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
	<title>Cadastrar Indivíduo</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/cadastroIndividuo.css" />

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
						<h3><strong>Cadastrar Indivíduo</strong></h3>
					</div>
				</div>
			</nav>


			<p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span id="pCaminhoAtual">Cadastrar Indivíduo</span></p>


			<div id="divTitulo">

			</div>

			<div class="center-father">
				<div id="board" class="center-child">

					<div id="divForm">
						<form action="../../Model/sqlCadastrarIndividuo.php" method="POST" onsubmit="return ValidateDate();">
							<div id="divNomeData">
								<div id="divNome" class="form-group">
									<label for="inputNome">Nome completo:<span style="color: red;">*</span></label>
									<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Insira o nome do indivíduo" required="yes">
								</div>
								<div id="divData" class="form-group">
									<label for="inputData">Data de Nascimento:</label>
									<input type="text" id="inputData" name="inputData" class="form-control phone-mask" placeholder="dd/mm/aaaa">
								</div>
								<script type="text/javascript">
									$("#inputData").mask("00/00/0000");
								</script>
							</div>
							<div id="divPesoAlturaSexo">
								<div id="divPeso" class="form-group">
									<label for="inputPeso">Peso (Kg):</label>
									<input type="number" min="0" step="0.01" class="form-control" id="inputPeso" name="inputPeso" placeholder="Insira o peso">
								</div>
								<div id="divAltura" class="form-group">
									<label for="inputAltura">Altura (m):</label>
									<input type="number" min="0" step="0.01" class="form-control" id="inputAltura" name="inputAltura" placeholder="Insira a altura">
								</div>
								<div id="divSexo" class="form-group form-check">
									<label class="form-check-label">Sexo:</label>
									<div>
										<input id="radio" type="radio" name="radio" value="f">Feminino<br>
										<input id="radio" type="radio" name="radio" value="m">Masculino<br>
									</div>
								</div>
							</div>
							<div id="divPesoAlturaSexo">
								<div id="divPeso" class="form-group">
									<label for="cincurferenciaCintura">Circunf. da cintura:</label>
									<input type="number" min="0" step="0.01" class="form-control" id="cincurferenciaCintura" name="cincurferenciaCintura" aria-describedby="cincurferenciaCintura" placeholder="">
								</div>
								<div id="divAltura" class="form-group">
									<label for="cidade">Cidade:</label>
									<input type="text" id="cidade" name="cidade" class="form-control" placeholder="">
								</div>
								<div id="divSexo" class="form-group">
									<label for="estado">Estado:</label>
									<input type="text" id="estado" name="estado" class="form-control" placeholder="">
								</div>


							</div>
							<div id="divEmailCelular">
								<div id="divEmail" class="form-group">
									<label for="inputEmail">E-mail:</label>
									<input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Insira o e-mail">
								</div>
								<div id="divCelular" class="form-group">
									<label for="inputCelular">Celular:</label>
									<input type="text" id="inputCelular" name="inputCelular" class="form-control" placeholder="(dd) xxxxx-xxxx">
								</div>

								<script type="text/javascript">
									$("#inputCelular").mask("(00) 00000-0000");
								</script>
							</div>
							<small style="color: red;">* Campos Obrigatórios</small>
							<div id="divBotoes">
								<button id="btnConfirmar" type="submit" class="btn">Salvar</button>
								<!--<a id="btnVoltar" href="interfaceCalculo.php" class="btn btn-dark" role="button">Voltar</a>-->
								<input name="Voltar" id="btnVoltar" type="button" class="btn btn-dark m-3" Value="Voltar" onclick="goBack()" />
							</div>

						</form>
					</div>
				</div>

			</div>
			<div class="relative">
				<div class="footer">
					© 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
				</div>
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

		<script>
			function goBack() {
				window.history.back();
			}
		</script>

		<script type="text/javascript">
			function ValidateDate() {
				//Get the date from the TextBox.
				var dateString = document.getElementById("inputData").value;
				var regex = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g;

				//Check whether valid dd/MM/yyyy Date Format.
				console.log(dateString);
				if (regex.test(dateString) || dateString == "") {
					return true;

				} else {
					alert("Por favor, insira uma data no formato dd/mm/yyyy válida.");
					return false;
				}
			}
		</script>
	</div>
	</div>


</body>

</html>