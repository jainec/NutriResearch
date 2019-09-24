<?php

session_start();
include '../../Controller/controllerVerificaLogin.php';
include '../../Model/sqlSelectAlimentoReceitaById.php';

?>


<!DOCTYPE html>
<html>

<head>
	<!--<meta charset="UTF-8"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
-->


	<!-- CSS Files -->
	<!--<link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <title>Cadastrar Avaliação</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel = "stylesheet" type = "text/css" href = "css/cadastroAvaliacao.css" />-->

	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Editar Alimento-Receita</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>



	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



	<!-- Bootstrap CSS CDN -->

	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
	<link href="css/bootstrap.min_cadastroAlimentoReceita.css" rel="stylesheet" />
	<link href="css/gsdk-bootstrap-wizard_cadastroAlimentoReceita.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/editarAlimentoReceita.css" />




</head>

<body>

	<?php
	$displayError = 'none';
	if (isset($_SESSION['alimento-receita-cadastrado'])) {
		$displayError = 'block';
		$alerta = "Esse alimento já existe no sistema!";
		$_SESSION['alimento-receita-cadastrado'] = null;
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

	<div class="wrapper">
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
						<li class="active">
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
		</div>
		<!-- Page Content  -->
		<div id="content">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<div id="container-title">
						<div id="sidebarSymbol">
							<button type="button" id="sidebarCollapse" class="btn btn-info">
								<i class="fas fa-align-left"></i>
							</button>
						</div>
						<div id="sidebarTitle">
							<h3><strong>Editar Alimento-Receita</strong></h3>
						</div>
					</div>

				</div>
			</nav>



			<div id="divTitulo"></div>



			<!--   Big container   -->
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">

						<!--      Wizard container        -->
						<div class="wizard-container">
							<div class="card wizard-card" data-color="blue" id="wizard">
								<form action="../../Model/sqlUpdateAlimentoReceita.php" method="POST">
									<!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->


									<div class="wizard-navigation">
										<ul>
											<li><a href="#nome" data-toggle="tab">Nome</a></li>
											<li><a href="#ingredientes" data-toggle="tab">Ingredientes</a></li>
											<li><a href="#modoDePreparo" data-toggle="tab">Modo de Preparo</a></li>
											<li><a href="#fonte" data-toggle="tab">Fonte</a></li>
										</ul>
									</div>
									<div id="board-content" class="tab-content">
										<div class="tab-pane" id="nome">
											<table>
												<tr>
													<td class="td-padding-left">
														<input style="display:none;" name='id_alimento' value=<?=$row_alimento['id_alimento']?>>
														<input style="display:none;" name='id_receita_modo_de_preparo' value=<?=$row_alimento['id_receita_modo_de_preparo']?>>
														<label class="label-nome" for="inputNome">Nome do Alimento:<span style="color: red;">*</span></label>
														<input type="text" required class="form-control" id="inputNome" name="inputNome" value="<?= $row_alimento['tx_nome'] ?>" style="width: 500px;">
													</td>
												</tr>
												<tr>
													<td class="td-padding-left">
														<label class=" label-nome" for="inputGramas">Gramas:<span style="color: red;">*</span></label>
														<input type="number" min="0" required step="0.01" class="form-control" id="inputGramas" name="inputGramas" value=100 style="width:100px;">
													</td>
													<small style="color: red; float:right; margin-right: 15px;">* Campos Obrigatórios</small>
												</tr>
											</table>

										</div>

										<div class="tab-pane" id="ingredientes">
											<table class="table table-striped">
												<tbody id="tab_logic">
													<?php
													include '../../Model/sqlSelectIngredientes.php';
													$index = -1;
													while ($row_ingredientes = pg_fetch_array($result_ingredientes)) {
														$index++;
														?>

														<tr id="addr0">
															<td>
																<label for="inputAlimento<?=$index?>">Alimento:<span style="color: red;">*</span></label>
																<select id="inputAlimento<?=$index?>" class="form-control" name="alimentos[]" onchange="getAlimentoId(<?=$index?>)" required>
																	<option value=-1>Selecione um alimento</option>
																	<?php

																		include '../../Model/sqlSelectAlimentoDropDown.php';
																		while ($row_list = pg_fetch_assoc($result)) {
																			if ($row_ingredientes['id_ingrediente'] == $row_list['id_alimento']) {
																				?>
																			<option selected value="<?= $row_list['id_alimento'] ?>">
																				<?= $row_list['tx_nome'] ?>
																			</option>
																		<?php } else {
																					?>

																			<option value="<?= $row_list['id_alimento'] ?>">
																				<?= $row_list['tx_nome'] ?>
																			</option>
																	<?php
																			}
																		}
																		?>

																</select>
															</td>
															<td>
																<label>Medida:<span style="color: red;">*</span></label>
																<select id="selectMedida<?=$index?>" class="form-control" name="medidas[]" required>

																<?php
																$_POST['id_ingrediente'] = $row_ingredientes['id_ingrediente'];
																$_POST['id_medida'] = $row_ingredientes['id_medida'];
																	include '../../Model/sqlSelectMedidasDoAlimentoEditar.php';
																?>

																</select>
															</td>
															<td>
																<label for="inputQntd">Quantidade:<span style="color: red;">*</span></label>
																
																<input type="number" value=<?=$row_ingredientes['fl_quantidade']?> name="quantidades[]" min="0.1" step="0.1" class="form-control" id="inputQntd" required="true">
															</td>
															<td>
																<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
															</td>

														</tr>
													<?php
													} ?>


												</tbody>
											</table>

											<div id="" class="center-father">

												<img id="add_row" src="icons/addIcon.svg" width="27px;">

											</div>
										</div>

										<div class="tab-pane" id="modoDePreparo">
											<div style="text-align: center; margin-bottom: 20px;">
												<label>Por favor, descreva o modo de preparo do alimento: (Opcional)</label>
											</div>
											<div id="textarea-modo" style="text-align: center;">
												<textarea id="textarea" name="textarea" style="width: 600px; height: 300px;"><?= $row_alimento['tx_descricao'] ?></textarea>
											</div>
										</div>

										<div class="tab-pane td-padding-left" id="fonte">
											<div style="width: 500px; text-align: center;">
												<label>Fonte:<span style="color: red; margin-bottom: 20px;">*</span></label><br>

												<select id="selectFonte" class="form-control" name="fontes[]" style="width:500px">
													<?php

													include '../../Model/sqlSelectFonte.php';
													while ($row_list = pg_fetch_assoc($result)) {
														if ($row_list['id_fonte'] == $row_alimento['id_fonte']) {
															?>
															<option selected value=<?= $row_list['id_fonte'] ?>>
																<?= $row_list['tx_descricao'] ?>
															</option>
														<?php } else { ?>
															<option value=<?= $row_list['id_fonte'] ?>>
																<?= $row_list['tx_descricao'] ?>
															</option>
													<?php
														}
													}
													?>

												</select>
											</div>
										</div>


									</div>
									<div class="wizard-footer">
										<div class="pull-right">
											<input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Próximo' />
											<input type='submit' class='btn btn-finish btn-fill  btn-wd btn-sm' name='finish' value='Finalizar' />
										</div>
										<div class="pull-left">
											<input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Voltar' />
										</div>
										<div class="clearfix"></div>
									</div>

								</form>
							</div>
						</div>
						<div id="" class="center-father">
							<a id="btnVoltar" href="interfaceGerenciamento.php" class="btn btn-dark" role="button">Voltar</a>
						</div>
						<!-- wizard container -->
					</div>
				</div>
				<!-- row -->
			</div>
			<!--  big container -->



			<script>
				function goBack() {
					window.history.back();
				}
			</script>






			<div class="relative">
				<div class="footer">
					© 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
				</div>
			</div>

			<script type="text/javascript">
				function getAlimentoId(index) {
					var value = $('#inputAlimento' + index).find(":selected").val();
					console.log(value);
					$.ajax({
						url: '../../Model/sqlSelectMedidasDoAlimento.php',
						type: 'POST',
						data: {
							'value': value
						},
						success: function(data) {
							$('#selectMedida' + index).html(data);
						}
					});
				}
			</script>

			<!--COLAPSAR-->
			<script type="text/javascript">
				$(document).ready(function() {
					$('#sidebarCollapse').on('click', function() {
						$('#sidebar').toggleClass('active');
						$(".footer").toggleClass('largerFooter');
					});
				});
			</script>

			<script type="text/javascript">
				$(document).ready(function() {
					var j = <?=$index+1?>;
					$('#add_row').click(function() {
						var index = j;
						j++;
						console.log(index);
						$.ajax({
							url: "tableRowAlimentoReceita.php",
							type: "POST",
							data: {
								'index': index
							},
							success: function(response) {
								$('#tab_logic').append(response);
							}
						});
					});
				})
			</script>

			<script>
				$(document).ready(function() {
					$('[data-toggle="tooltip"]').tooltip();
					var actions = $("table td:last-child").html();
					// Delete row on delete button click
					$(document).on("click", ".delete", function() {
						$(this).parents("tr").remove();
						$(".add-new").removeAttr("disabled");
					});
				});
			</script>



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

			<!--   Core JS Files   -->
			<script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
			<script src="js/bootstrap.min.js" type="text/javascript"></script>
			<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

			<!--  Plugin for the Wizard -->
			<script src="js/gsdk-bootstrap-wizard.js"></script>

			<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
			<script src="js/jquery.validate.min.js"></script>

</body>

</html>