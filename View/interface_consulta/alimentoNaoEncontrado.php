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
	<!--Material icones-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>	
	<link rel="stylesheet" type="text/css" href="css/alimentoNaoEncontrado.css">

	<title>Buscar Alimento</title>
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
					<div id="tittle" >           
						<h3><strong>Buscar Alimento ou Receita</strong></h3>
					</div>
				</div>
			</nav>
    <div>

    <div>
        <p id="pCaminho">Você está em <span> <a class="a-caminho" href="buscaAlimento.php"> Interface de Busca </a></span> > <span id="pCaminhoAtual">Alimento não encontrado</span></p>
    </div>
        
    <div class="container">
      <div class="d-flex justify-content-center pt-5 pb-5">
        <h4>Nenhum alimento com o nome <strong><?php echo $_SESSION['nome_alimento'] ?> </strong>foi encontrado!</h4>
      </div>
      <div class="d-flex justify-content-center pt-5 pb-5">
        <i class="icon ion-md-sad display-1"></i>
      </div>				    
      
      <div class="d-flex flex-column align-items-center">
        <div>
          <a id="btnVoltar" href="buscaAlimento.php" class="btn btn-dark" role="button">Voltar</a>
        </div>    
      </div>   
      
    </div>

    <!--footer-->
    <div class="relative">
      <div class="footer">
        © 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
      </div>
		</div>
  </div>

	<!-- Footer -->
	
   <!-- Footer -->

   <!--COLAPSAR-->
	<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(".footer").toggleClass('largerFooter');
        });
    });
  </script>

</body>

</html>
