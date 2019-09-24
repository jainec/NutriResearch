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
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Cadastrar Alimento Receita</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel = "stylesheet" type = "text/css" href = "css/cadastroAlimentoReceita.css" />
</head>

<body>

    <?php 
		
		$display = 'none';
		if($_SESSION['alimento-receita-cadastrado']) {
			$display = 'block';
			$alerta = "Esse alimento já existe no sistema!";
			$_SESSION['alimento-receita-cadastrado'] = null;
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
	      	<img width="40px;" src="icons/error.svg" style="margin-right: 35%;">
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
						Jaine Conceição
					</a>
				</li>
				<li>
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
				<li class="active">
					<a href="#">
						<i class="fas fa-user-cog"></i>
						Interface de Gerenciamento
					</a>
				</li>
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
					<a href="#">
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
				<h3><strong>Cadastrar Alimento Receita</strong></h3>
			</div>
		</div>
	</nav>


    <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceGerenciamento.php">Interface de Gerenciamento</a></span> > <span id="pCaminhoAtual">Cadastrar Alimento Receita</span></p>
    

    <div id="divTitulo">
        
    </div>
    <br>

    <div id="divForm">
        <form action="../../Model/sqlInsertAlimentoReceita.php" method="POST">
           
            <div id="divIndividuoData">
                <div id="div-numero-avaliacao">
                    <label>Nome do Alimento:<span style="color: red;">*</span></label>
                </div>
                <div id="div-input-numero-avaliacao">
                    <input id="input-nome" type="text" name="input-nome" placeholder="" class="form-control" required="true">
                </div>

                <div id="div-data">
                    <div id="divDataPicker">
                        <label>Gramas:<span style="color: red;">*</span></label>
                    </div>
                    <div id="div-input-gramas">
                       <input type="number" min="0.1" step="0.1" class="form-control" id="inputGramas" name="inputGramas" placeholder="" required="true">
                    </div>
                </div>
            </div>

            <hr>

            <h4 style="text-align: center;">Ingredientes</h4><br>

            <table  class="table table-striped">
                <tbody id="tab_logic" >
                <tr id="addr0"><td><div id="divAvaliacoes">
                    <div id="divAvaliacao">
                       
                        <div id="divAlimento" class="form-group">
                            <label for="inputAlimento">Alimento:</label>
                            <select id="inputAlimento" class="form-control" name="alimentos[]">
                                <script type="text/javascript">
                                    $('select').on('change', function() {
                                        var value = this.value ;
                                        $.ajax({

                                            url:'../../Model/sqlSetIdAlimento.php',
                                            type:'POST',
                                            data: { 
                                                'value': value
                                            },

                                            success: function(data) {
                                                
                                            }
                                        });
                                    })
                                                                    
                                </script>

                                <?php  
                                    include '../../Model/sqlSelectAlimentoDropDown.php';
                                    while($row_list=pg_fetch_assoc($result)){
                                        echo '<option value="'.$row_list['id_alimento'].'"> '.$row_list['tx_nome'].' </option>';
                                    }
                                ?>
        
                            </select>   
                        </div>
                        <div id="divMedida" class="form-group">
                            <label>Medida:</label>
                            <select id="selectMedida" class="form-control" name="medidas[]">
                                <?php  
                                    include '../../Model/sqlSelectMedidasDoAlimento.php';
                                    while($row_list=pg_fetch_assoc($result)){
                                        echo '<option value="'.$row_list['id_medida'].'"> '.$row_list['tx_descricao'].' </option>';
                                    }
                                ?>
        
                            </select>   
                        </div>
                        <div id="divQntd">
                            <label for="inputQntd">Quantidade:<span style="color: red;">*</span></label>
                            <input type="number" name="quantidades[]" min="0.1" step="0.1" class="form-control" id="inputQntd" placeholder="" required="true" value=50>
                        </div>
                    </div></td></tr>

                    
                </tbody>
            </table>
                          
             <div id="divAdd">
                    
            	<img id="add_row" src="icons/addIcon.svg" width="27px;">
                    
            </div>  

            <hr>

            <h4 style="text-align: center;">Modo de Preparo</h4><br>

            <div id="div-add-modo" class="divBotoes">
                <a id="btn-add-modo-de-preparo" href="#" class="btn">Adicionar</a>
            </div>

            <div id="textarea-modo" style="text-align: center; display: none;">
                <label>Por favor, descreva o modo de preparo do alimento:</label>
                <textarea id="textarea" name="textarea" style="width: 600px; height: 300px;"></textarea>
            </div>

            <script type="text/javascript">
                $( "#btn-add-modo-de-preparo" ).click(function() {
                    $( "#textarea-modo" ).toggle();
                });     
            </script>

            <hr>

            <h4 style="text-align: center;">Fonte:</h4><br>

             <select id="selectFonte" class="form-control" name="fontes[]">
                <?php  
                
                    include '../../Model/sqlSelectFonte.php';
                    while($row_list=pg_fetch_assoc($result)){
                        echo '<option value="'.$row_list['id_fonte'].'"> '.$row_list['tx_descricao'].' </option>';
                    }
                ?>

            </select>   

            <br>
            <hr>

            <small style="color: red;">* Campos Obrigatórios</small>
            <div class="divBotoes">
                <button id="btnConfirmar" type="submit" class="btn">Salvar</button>
                <!--<a id="btnVoltar" href="avaliacaoSelecionarIndividuo.php" class="btn btn-dark" role="button">Voltar</a>-->
                <input name="Voltar" id="btnVoltar" type="button"  class="btn btn-dark m-3" Value="Voltar" onclick = "goBack()"/>
            </div>
            
               
        </form>
     <div class="push"></div>  
    </div>

    <script>
        function goBack() {
          window.history.back();
        }
    </script>
      
    <script type="text/javascript">
      $(document).ready(function(){
        $('#add_row').click(function(){
          var j = 1;
          var dataString = "j="+j;
          $.ajax({
            url: "tableRowAlimentoReceita.php",
            type: "post",
            data: dataString,
            success: function(response){
              $('#tab_logic').append(response);
            }
          });
        });
      })
    </script>

<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</div>

      
</body>

</html>