<?php 
session_start(); 

$display = 'none';
$alerta = '';

// erro de senhas e emails diferentes
if(isset($_SESSION['alerta'])) {
  $display = 'block';
  $alerta = $_SESSION['alerta'];
  $_SESSION['alerta'] = null;
}

// erro de email ja existir
if(isset($_SESSION['nao_cadastrado'])) {
	$display = 'block';
	$alerta = 'O e-mail utilizado ja foi cadastrado!';
}
unset($_SESSION['nao_cadastrado']);

?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<title>Cadastrar-se</title>
	<link rel="icon" href="icons/nutri_logo3.png">
	<link rel = "stylesheet" type = "text/css" href = "css/cadastroNoSistema.css" />
	
</head>

<body>

	<nav id="nav" class="navbar navbar-expand-lg navbar-light">
  		<a class="navbar-brand" href="index.php">Início	</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" 
						data-target="#navbarNav" aria-controls="navbarNav" 
						aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
            <div class="col d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li id="liSobre" class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>
                </ul>
            </div>
  		</div>
	</nav>

	<img src="icons/nutri_logo3.png" style="width: 150px; height: 110px; margin-top: 12px;" class="rounded mx-auto d-block" alt="...">
	<div id="div-titulo">
		<h4><strong>Fazer Cadastro</strong></h4>
	</div>
	
	<!-- Exibirá com condicao -->
	<div id="modal" class="modal" tabindex="-1" role="dialog" 
			style="display: <?=$display?>">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title">
				<?=$alerta?>
			</h5>
			<button type="button" class="close close-modal" 
					data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-footer">
			<img width="50px;" src="icons/error.png"
					style="margin-right: 35%;">
			<button id="btn-ok" type="button" class="btn close-modal"
					data-dismiss="modal">OK</button>
			</div>
		</div>
		</div>
	</div>

	<div id="div-form">
		<form name="form" method="POST" action="../../Controller/controllerCadastroNoSistema.php" >
			<div id="">
			   	<div id="div-nome" class="form-group">
			    	<label for="inputNome">Nome completo:<span style="color: red;">*</span></label>
			    	<small style="color: red;">* Campos Obrigatórios</small>
			    	<input name="nome" required type="text" class="form-control" id="inputNome" 
						   placeholder="Insira o seu nome completo">
			 	</div>
			 	
			</div>
		  	<div id="div-email-e-confirmacao">
			 	<div id="div-email" class="form-group">
			    	<label for="inputEmail">E-mail:<span style="color: red;">*</span></label>
			    	<input name="email1" required type="email" class="form-control" id="inputEmail" 
						   placeholder="Insira o seu e-mail">
			  	</div>
			  	<div id="div-confirmacao-email" class="form-group">
			    	<label for="inputConfirmacaoEmail">Confirmar E-mail:<span style="color: red;">*</span></label>
			    	<input name="email2" required type="email" class="form-control" id="inputConfirmacaoEmail" 
					       placeholder="Confirme o e-mail"/>
			  	</div>
			</div>
			<div id="">
				<div id="div-senha" class="form-group">
		    		<label for="inputSenha">Senha:<span style="color: red;">*</span></label>
		    		<input name="senha1" required type="password" class="form-control" id="inputSenha"
					       placeholder="Insira uma senha">
		  		</div>
		  		<div id="div-confirmacao-senha" class="form-group">
		    		<label for="inputConfirmacaoSenha">Confirmar Senha:<span style="color: red;">*</span></label>
		    		<input name="senha2" required type="password" id="inputConfirmacaoSenha" class="form-control" 
					       placeholder="Confirme a senha"/>
		  		</div>
		  	</div>

		  	
		  	<div style="text-align: center; font-size: 15px;">
		  		Já possui uma conta? <a href="login.php">Efetue login.</a>
		  	</div>

		  	<div id="div-botoes">
				<input name="registrar" id="btn-confirmar" type="submit" class="btn" 
					value="Registrar" />
				  <!--<a id="btn-voltar" href="index.php" class="btn btn-dark m-3" role="button">Voltar</a>-->
				  <input name="Voltar" id="btn-voltar" type="button"  class="btn btn-dark m-3" Value="Voltar" onclick = "goBack()"/>
		  	</div>

		</form>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer font-small blue">

	 	<!-- Copyright -->
	  	<div class="footer-copyright text-center py-3">
	  		© 2019 Copyright | Jaine Conceição e Raul Andrade
	  	</div>
	  	<!-- Copyright -->

	</footer>
	<!-- Footer -->

	<script>
	    function goBack() {
	      window.history.back();
	    }
  	</script>
	
	<!-- Script jquery -->
	<script type="text/javascript">
    	jQuery(document).ready(function(){
        	jQuery('.close-modal').on('click', function(event) {        
             jQuery('#modal').toggle('show');
        	});
    	});
	</script>
</body>

</html>