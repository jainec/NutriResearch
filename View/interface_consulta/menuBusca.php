<?php 
	
	session_start(); 
	include '../../Controller/controllerVerificaLogin.php';
  	include '../../Model/conexao_bd.php';
  	if (!empty($_POST)) {
		$nome_alimento = $_POST['inputBusca'];
	    $result = pg_query($conexao, "SELECT id_alimento, tx_nome FROM nutriresearch.alimento WHERE UPPER(tx_nome) = UPPER('$nome_alimento');");
	    if (!$result OR pg_num_rows($result) == 0) {
	    	$_SESSION['nome_alimento'] = $nome_alimento;
	    	header("Location: alimentoNaoEncontrado.php"); /* Redirect browser */
			exit();
	    }
	
	    $row = pg_fetch_array($result);
	    $_SESSION['id_alimento'] = $row['id_alimento'];
	    $_SESSION['nome_alimento'] = $row['tx_nome'];
	}
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>

	<title>Menu de Busca</title>

	<link rel="icon" href="icons/nutri_logo3.png">

	<link rel = "stylesheet" type = "text/css" href = "css/menuBusca.css" />
		
</head>

<body>

	<nav id="nav" class="navbar navbar-expand-lg navbar-light">
			<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
		  		<a class="navbar-brand" href="buscaAlimento.php">Início	</a>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
	  			</button>
	  		<!--<div class="collapse navbar-collapse" id="navbarNav">-->
	    		<ul class="navbar-nav mr-auto">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="buscaAlimento.php">Interface de Busca <span class="sr-only">(current)</span></a>
	      			</li>
	      			<li class="nav-item">
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


	<p id="pCaminho">Você está em <span><a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a> </span> <span>  > <span id="pCaminhoAtual">Menu Alimento</span></p>
	<hr size="20">

	
	<div id="divTitulo">
		<h1><strong>Alimento buscado: <?php echo $_SESSION['nome_alimento']; ?> </strong></h1>
	</div>

	

	<div id="divRetangulo">
		<p id="pSelecione" >Selecione o que você deseja visualizar:</p>
		<div id="divRetanguloTop">
			<div id="divRetanguloTopLeft">
				<p class="pOpcoesVisualizacao" >Composição</p>
				<a href="composicaoAlimento.php"><img src="icons/composicao.png" width="82" height="76" title="Composição" alt="Composição"></a>
			</div>	
			<div id="divRetanguloTopRight">
				<p class="pOpcoesVisualizacao" >Medidas Caseiras</p>
				<a href="medidasCaseiras.php"><img src="icons/medidas.png" width="87" height="76" title="Medidas" alt="Medidas"></a>
			</div>
		</div>

		<div id="divRetanguloBottom">
			<div id="divRetanguloBottomLeft">
				<p class="pOpcoesVisualizacao" >Receita</p>
				<a href="receitaAlimento.php"><img src="icons/recipe.png" width="72" height="76" title="Receita" alt="Receita"></a>
			</div>	
			<div id="divRetanguloBottomRight">
				<p class="pOpcoesVisualizacao" >Decisões</p>
				<a href="decisoesAlimento.php"><img src="icons/decisao.png" width="82" height="76" title="Decisões" alt="Decisões"></a>

			</div>
		</div>
	</div>

	<a id="btnVoltar" href="buscaAlimento.php" class="btn btn-dark" role="button">Voltar</a>


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