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
		<link rel="icon" href="icons/nutri_logo3.png">
		<link rel = "stylesheet" type = "text/css" href="css/buscaAlimento.css" />
		<!-- Font Awesome JS -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
						<?php  echo $_SESSION['usuario_nome']?>
					</a>
				</li>
				<li class="active">
					<a href="../interface_consulta/buscaAlimento.php" data-toggle="collapse">
						<i class="fas fa-search"></i>
						Interface de Busca
					</a>
				</li>
				<li >
					<a href="../interface_calculo/interfaceCalculo.php">
						<i class="fas fa-tasks"></i>
						Interface de Cálculo
					</a>
				</li>
				<?php 
					include '../../Model/sqlSelectGestor.php';
					$row=pg_fetch_array($result);
					if ($row['bl_gestor'] == 't') {
				?>
					<li class="">
						<a href="../interface_gerenciamento/interfaceGerenciamento.php">
						<i class="fas fa-user-cog"></i>
							Interface de Gerenciamento
						</a>
					</li>
  				<?php }?>				
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
						<h3><strong></strong></h3>
					</div>
				</div>
			</nav>

			<div id="divImg">
				<img style="width: 150px;" src="icons/nutri_logo3.png">
			</div>

			<div id="divTitulo">
				<h1><strong>Buscar Alimento ou Receita</strong></h1>
			</div>

			<div class="center-father">
				<form autocomplete="off" id="form-search" name="" action="menuBusca.php" method="POST">
					<div id="" class="col-12 "> 
						<input name="inputBusca" id="inputBusca" type="text" class="form-control" placeholder="Digite o nome de um alimento ou receita" required="yes">
						<div id="div-search-icon">
							<input id="search-icon" type="image" name="submit" src="icons/search-icon.png" border="0" alt="Submit" style="width: 21px;" />
						</div>
					</div>
				</form>
			</div>

			<div class="relative">
				<div class="footer">
					© 2019 Copyright | <a class="link-footer" target="_blank" href="https://github.com/jainec">Jaine Conceição</a> e <a class="link-footer" target="_blank" href="">Raul Andrade</a>
				</div>
			</div>
			
		</div>
	</div>

	<!-- AUTOCOMPLETE-->
	<script type="text/javascript">
		function autocomplete(inp, arr) {
			/*the autocomplete function takes two arguments,
			the text field element and an array of possible autocompleted values:*/
			var currentFocus;
			/*execute a function when someone writes in the text field:*/
			inp.addEventListener("input", function(e) {
				var a, b, i, val = this.value;
				/*close any already open lists of autocompleted values*/
				closeAllLists();
				if (!val) { return false;}
				currentFocus = -1;
				/*create a DIV element that will contain the items (values):*/
				a = document.createElement("DIV");
				a.setAttribute("id", this.id + "autocomplete-list");
				a.setAttribute("class", "autocomplete-items");
				/*append the DIV element as a child of the autocomplete container:*/
				this.parentNode.appendChild(a);
				/*for each item in the array...*/
				for (i = 0; i < arr.length; i++) {
				/*check if the item starts with the same letters as the text field value:*/
				if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
					/*create a DIV element for each matching element:*/
					b = document.createElement("DIV");
					/*make the matching letters bold:*/
					b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
					b.innerHTML += arr[i].substr(val.length);
					/*insert a input field that will hold the current array item's value:*/
					b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
					/*execute a function when someone clicks on the item value (DIV element):*/
						b.addEventListener("click", function(e) {
						/*insert the value for the autocomplete text field:*/
						inp.value = this.getElementsByTagName("input")[0].value;
						/*close the list of autocompleted values,
						(or any other open lists of autocompleted values:*/
						closeAllLists();
					});
					a.appendChild(b);
				}
				}
			});
			/*execute a function presses a key on the keyboard:*/
			inp.addEventListener("keydown", function(e) {
				var x = document.getElementById(this.id + "autocomplete-list");
				if (x) x = x.getElementsByTagName("div");
				if (e.keyCode == 40) {
				/*If the arrow DOWN key is pressed,
				increase the currentFocus variable:*/
				currentFocus++;
				/*and and make the current item more visible:*/
				addActive(x);
				} else if (e.keyCode == 38) { //up
				/*If the arrow UP key is pressed,
				decrease the currentFocus variable:*/
				currentFocus--;
				/*and and make the current item more visible:*/
				addActive(x);
				} else if (e.keyCode == 13) {
				/*If the ENTER key is pressed, prevent the form from being submitted,*/
				e.preventDefault();
				if (currentFocus > -1) {
					/*and simulate a click on the "active" item:*/
					if (x) x[currentFocus].click();
				}
				}
			});
			function addActive(x) {
			/*a function to classify an item as "active":*/
			if (!x) return false;
			/*start by removing the "active" class on all items:*/
			removeActive(x);
			if (currentFocus >= x.length) currentFocus = 0;
			if (currentFocus < 0) currentFocus = (x.length - 1);
			/*add class "autocomplete-active":*/
			x[currentFocus].classList.add("autocomplete-active");
			}
			function removeActive(x) {
			/*a function to remove the "active" class from all autocomplete items:*/
			for (var i = 0; i < x.length; i++) {
				x[i].classList.remove("autocomplete-active");
			}
			}
			function closeAllLists(elmnt) {
			/*close all autocomplete lists in the document,
			except the one passed as an argument:*/
			var x = document.getElementsByClassName("autocomplete-items");
			for (var i = 0; i < x.length; i++) {
				if (elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
			}
		}
		/*execute a function when someone clicks in the document:*/
		document.addEventListener("click", function (e) {
			closeAllLists(e.target);
		});
	}
	</script>
		
	<script>
		<?php 
			include '../../Model/sqlSelectAlimento.php';
		?>

		var alimentos = <?php echo json_encode($nomes_alimentos); ?>;
		
		for (var i = alimentos.length - 1; i >= 0; i--) {
			alimentos[i] = alimentos[i].toString().replace("]","");
		}

		autocomplete(document.getElementById("inputBusca"), alimentos);
	</script>

	<!--COLAPSAR-->
	<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$(".footer").toggleClass('largerFooter');
            });
        });
    </script>
		
	<!--<div class="footer-class">-->
	<!-- Footer -->
	<!--<footer id="footer" class="page-footer font-small blue">-->
		<!-- Copyright -->
		<!--	<div class="footer-copyright text-center py-3">
			© 2019 Copyright | Jaine Conceição e Raul Andrade
		</div>-->
		<!-- Copyright -->
	<!--</footer>-->
	<!-- Footer -->
	<!--</div>-->
	</body>
</html>