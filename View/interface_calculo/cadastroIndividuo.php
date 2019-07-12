<?php 
	session_start(); 
	include '../../Controller/controllerVerificaLogin.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<title>Cadastrar Indivíduo</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel = "stylesheet" type = "text/css" href = "css/cadastroIndividuo.css" />


</head>

<body>

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


	<p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span> > <span id="pCaminhoAtual">Cadastrar Indivíduo</span></p>
	<hr size="20">

	<div id="divTitulo">
		<h1><strong>Cadastrar Indivíduo</strong></h1>
	</div>

	<div id="divForm">
		<form action="../../Model/sqlCadastrarIndividuo.php" method="POST">
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
						<input type="radio" name="radio" value="f">Feminino<br>
			    		<input type="radio" name="radio" value="m">Masculino<br>
			    	</div>
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
				<input name="Voltar" id="btnVoltar" type="button"  class="btn btn-dark m-3" Value="Voltar" onclick = "goBack()"/>
		  	</div>

		</form>
	</div>

	
	<script>
	    function goBack() {
	      window.history.back();
	    }
  	</script>

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