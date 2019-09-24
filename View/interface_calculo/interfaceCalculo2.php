<?php 
	session_start();
	include '../../Controller/controllerVerificaLogin.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<title>Interface de Cálculo</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel = "stylesheet" type = "text/css" href = "css/interfaceCalculo.css" />


</head>

<body>
	<?php 
		
		$display = 'none';
		if(isset($_SESSION['individuo-cadastrado'])) {
			$display = 'block';
			$alerta = "Indivíduo cadastrado com sucesso!";
			$_SESSION['individuo-cadastrado'] = null;
		}
		if(isset($_SESSION['avaliacao-cadastrada'])) {
			$display = 'block';
			$alerta = "Avaliação cadastrada com sucesso!";
			$_SESSION['avaliacao-cadastrada'] = null;
		}
	 ?>

    <div  id="modal" class="modal" tabindex="-1" role="dialog" style="display: <?php echo $display?>;">
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
		jQuery(document).ready(function(){
        jQuery('.close-modal').on('click', function(event) {        
             jQuery('#modal').toggle('show');
        });
    });

	</script>

	<nav id="nav" class="navbar navbar-expand-lg navbar-light">
		<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
	  		<a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início	</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
  			</button>
  		<!--<div class="collapse navbar-collapse" id="navbarNav">-->
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item">
        			<a class="nav-link" href="../interface_consulta/buscaAlimento.php">Interface de Busca <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item active">
        			<a class="nav-link" href="../interface_calculo/interfaceCalculo.php">Interface de Cálculo</a>
      			</li>
      		</ul>
			</div>
			<div class="mx-auto order-0 w-100">
        	<a id="liUsuario" class="nav-link" href=""><img src="icons/loginIcon.svg" width="25px">  <?php  echo $_SESSION['usuario_nome']?></a>
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
	</nav>

	<p id="pCaminho"><span id="pCaminhoAtual">Você está em Interface de Cálculo</span></p>
	<hr size="20">

	<div id="divTitulo">
		<h1><strong>Interface de Cálculo</strong></h1>
	</div>

	<div id="divRetangulo">
		<p id="pSelecione" >Selecione o que você deseja fazer:</p>
		<div id="divRetanguloTop">
			<div id="divRetanguloTopLeft">
				<p class="pOpcoesVisualizacao" >Visualizar Indivíduos</p>
				<a href="meusIndividuos.php"><img src="icons/individuosIcon.png" width="82" height="76" title="Indivíduos" alt="Indivíduos"></a>
			</div>	
			<div id="divRetanguloTopRight">
				<p class="pOpcoesVisualizacao" >Cadastrar Indivíduo</p>
				<a href="cadastroIndividuo.php"><img src="icons/addIndividuo.png" width="60" height="60" title="Adicionar Indivíduo" alt="Adicionar Indivíduo"></a>
			</div>
		</div>

		<div id="divRetanguloBottom">
			<div id="divRetanguloBottomLeft">
				<p class="pOpcoesVisualizacao" >Cadastrar Avaliação</p>
				<a href="avaliacaoSelecionarIndividuo.php"><img src="icons/addAvaliacao.png" width="72" height="76" title="Adicionar Avaliação" alt="Adicionar Avaliação"></a>
			</div>	
			<div id="divRetanguloBottomRight">
				<p class="pOpcoesVisualizacao" >Exportar Avaliações</p>
				<a href="#"><img src="icons/export.png" width="74" height="74" title="Exportar Avaliações" alt="Exportar Avaliações"></a>

			</div>
		</div>
	</div>

	<!--<button id="btnVoltar" type="button" class="btn btn-dark">Voltar</button>-->


	<!-- Footer -->
	<footer id="footer" class="page-footer font-small blue">

	 	<!-- Copyright -->
	  	<div class="footer-copyright text-center py-3">
	  		© 2019 Copyright | Jaine Conceição e Raul Andrade
	  	</div>
	  	<!-- Copyright -->

	</footer>
	<!-- Footer -->

</body>

</html>