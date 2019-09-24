<?php
session_start();
include '../../Controller/controllerVerificaLogin.php';
include '../../Model/sqlSelectUsuario.php';
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Meu Perfil</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel="stylesheet" type="text/css" href="css/meuPerfil.css" />

</head>

<body>
	<?php

	$display = 'none';
	if (isset($_SESSION['usuario-atualizado'])) {
		$display = 'block';
		$alerta = "Dados salvos com sucesso!";
		$_SESSION['usuario-atualizado'] = null;
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


	<!-- Sidebar  -->
	<div class="wrapper">
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3>Nutri Research</h3>
				<strong>NR</strong>
			</div>

			<ul class="list-unstyled components">

				<li class="active">
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
						<h3><strong>Meu Perfil</strong></h3>
					</div>
				</div>
			</nav>


			<div id="divTitulo">

			</div>

			<div class="center-father">
				<div id="board" class="center-child">

					<div id="divForm">
						<form action="../../Model/sqlUpdateUsuario.php" method="POST" onsubmit="return ValidateEqualFields();">
							<div id="divNomeData">
								<div id="divNome" class="form-group" style="display:none;">
									<label for="inputIdUsuario">Id usuario:<span style="color: red;">*</span></label>
									<input type="text" class="form-control width-500" id="inputIdUsuario" name="inputIdUsuario" value="<?php echo $row_usuario['id_usuario'] ?>" required="yes">
								</div>
								<div id="divNome" class="form-group ">
									<label for="inputNome">Nome completo:<span style="color: red;">*</span></label>
									<input type="text" class="form-control width-500" id="inputNome" name="inputNome" value="<?php echo $row_usuario['tx_nome'] ?>" required="yes">
								</div>
							</div>
							<div id="divPesoAlturaSexo">
								<div id="divPeso" class="form-group">
									<label for="inputEmail">E-mail:<span style="color: red;">*</span></label>
									<input type="email" class="form-control width-500" maxlength="45" id="inputEmail" name="inputEmail" value="<?php echo $row_usuario['tx_email'] ?>" required="yes">
								</div>
							</div>

							<div id="divEmailCelular">
								<div id="divEmail" class="form-group">
									<label for="inputEmailConfirmacao">Confirmação do e-mail:<span style="color: red;">*</span></label>
									<input type="email" class="form-control width-500" maxlength="45" id="inputEmailConfirmacao" name="inputEmailConfirmacao" required aria-describedby="emailHelp" value="<?php echo $row_usuario['tx_email'] ?>">
								</div>

							</div>
							<div id="divPesoAlturaSexo">
								<div id="divPeso" class="form-group">
									<label for="inputSenha">Senha:<span style="color: red;">*</span></label>
									<input pattern=".{8,}" maxlength="45" required title="A senha deve conter no mínimo 8 caracteres." type="password" class="form-control" id="inputSenha" name="inputSenha" aria-describedby="inputSenha" required value=<?php echo $row_usuario['tx_senha'] ?>>
								</div>
								<div id="divAltura" class="form-group">
									<label for="inputSenhaConfirmacao">Confirmação da senha:<span style="color: red;">*</span></label>
									<input pattern=".{8,}" maxlength="45" required title="A senha deve conter no mínimo 8 caracteres." type="password" id="inputSenhaConfirmacao" name="inputSenhaConfirmacao" class="form-control" required value="<?php echo $row_usuario['tx_senha'] ?>">
								</div>


							</div>

							<small style="color: red;">* Campos Obrigatórios</small>
							<div id="divBotoes">
								<button id="btnConfirmar" type="submit" class="btn" style="width: 90px; color: white;">Salvar</button>
								<!--<a id="btnVoltar" href="interfaceCalculo.php" class="btn btn-dark" role="button">Voltar</a>-->
								<input name="Voltar" id="btnVoltar" type="button" class="btn btn-dark m-3" Value="Cancelar" onclick="location.href = '../interface_consulta/buscaAlimento.php';" />
							</div>

						</form>

					</div>

				</div>


			</div>
			<form name="" action="../../Model/sqlDeleteUsuario.php" method="POST">
				<div id="divNome" class="form-group" style="display:none;">
					<label for="id_usuario">Id usuario:<span style="color: red;">*</span></label>
					<input type="text" class="form-control width-500" id="id_usuario" name="id_usuario" value="<?php echo $row_usuario['id_usuario'] ?>" required="yes">
				</div>
				<div class="center-father" style="margin-top:20px;">
					<div class="center-child">
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" style="height:35px;">
							Excluir conta
						</button>
					</div>
				</div>
				<!-- Modal HTML -->
				<div id="deleteModal" class="modal fade">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content">
							<div class="modal-header">
								<div class="icon-box">
									<i class="material-icons">&#xE5CD;</i>
								</div>
								<h4 class="modal-title">Você tem certeza?</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<p>Você realmente deseja deletar a sua conta? Esse processo não pode ser desfeito.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal2" onclick="hideModal1()">Deletar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal HTML -->
				<div id="deleteModal2" class="modal fade">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content">
							<div class="modal-header">
								<div class="icon-box">
									<i class="material-icons">&#xE5CD;</i>
								</div>
								<h4 class="modal-title">Mais uma vez:</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<p>Você TEM CERTEZA que deseja deletar a sua conta? Todas os seus indivíduos e avaliações serão perdidas!!!</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal2">Deletar Mesmo</button>
							</div>
						</div>
					</div>
				</div>
			</form>
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
			function hideModal1() {
				$("#deleteModal").modal('hide');
			}
		</script>


		<script type="text/javascript">
			function ValidateEqualFields() {
				if ($('#inputEmail').val() != $('#inputEmailConfirmacao').val()) {
					alert("Os e-mails digitados não são iguais.");
					return false
				} else if ($('#inputSenha').val() != $('#inputSenhaConfirmacao').val()) {
					alert("As senhas digitados não são iguais.");
					return false
				} else {
					return true;
				}
			}
		</script>


	</div>
	</div>


</body>

</html>