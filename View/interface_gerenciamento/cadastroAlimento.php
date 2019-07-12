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
	<title>Cadastrar Alimento</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel = "stylesheet" type = "text/css" href = "css/cadastroAlimento.css" />


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


	<p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceGerenciamento.php">Interface de gerenciamento</a></span> > <span id="pCaminhoAtual">Cadastrar Alimento</span></p>
	<hr size="20">

	<div id="divTitulo">
		<h1><strong>Cadastrar Alimento</strong></h1>
	</div>

	<div id="divForm">
		<form action="../../Model/sqlCadastrarAlimento.php" method="POST">
			<div id="divNomeData">
			   	<div id="divNome" class="form-group">
			    	<label for="inputNome">Nome:<span style="color: red;">*</span></label>
			    	<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Insira o nome do alimento" required="yes">
			 	</div>
			 	<div id="divGramas" class="form-group">
			    	<label for="inputGramas">Gramas:<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputGramas" name="inputGramas" placeholder="">
			 	</div>
			</div>

			<hr>
			<h4 style="text-align: center;">Composição:</h4><br>

		  	<div id="divPesoAlturaSexo">
			 	<div id="divEnergia" class="form-group composicao">
			    	<label for="inputEnergia">Energia (kal):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputEnergia" name="inputEnergia" placeholder="">
			  	</div>
			  	<div class="form-group composicao">
			    	<label for="inputPtn">Ptn. (g):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputPtn" name="inputPtn" placeholder="">
			  	</div>
			  	<div class="form-group composicaoFinal">
			    	<label for="inputCarb">Carb. (g):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputCarb" name="inputCarb" placeholder="">
			  	</div>
			</div>
			<div id="divPesoAlturaSexo">
			 	<div class="form-group composicao">
			    	<label for="inputLip">Lip. (g):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputLip" name="inputLip" placeholder="">
			  	</div>
			  	<div class="form-group composicao">
			    	<label for="inputCa">Ca (mg):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputCa" name="inputCa" placeholder="">
			  	</div>
			  	<div class="form-group composicaoFinal">
			    	<label for="inputFe">Fe (mg):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputFe" name="inputFe" placeholder="">
			  	</div>
			</div>
			<div id="divPesoAlturaSexo">
			 	<div class="form-group composicao">
			    	<label for="inputVitC">Vit. C (mg):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputVitC" name="inputVitC" placeholder="">
			  	</div>
			  	<div class="form-group composicao">
			    	<label for="inputVitA">Vit. A (uG RE):<span style="color: red;">*</span></label>
			    	<input type="number" min="0" step="0.01" class="form-control" id="inputVitA" name="inputVitA" placeholder="">
			  	</div>
			</div>

			<br><br><br><hr>
			<div style="width: 500px; text-align: center;">
				<h4>Fonte:<span style="color: red;">*</span></h4><br>

				 <select id="selectMedida" class="form-control" name="medidas[]">
	                <?php  
	                
	                    include '../../Model/sqlSelectFonte.php';
	                    while($row_list=pg_fetch_assoc($result)){
	                        echo '<option value="'.$row_list['id_fonte'].'"> '.$row_list['tx_descricao'].' </option>';
	                    }
	                ?>

	            </select>   
	        </div>

	        <br><hr>

		  	<br><small style="color: red;">* Campos Obrigatórios</small>
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