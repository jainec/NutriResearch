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
    <title>Cadastrar Alimento Receita</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel = "stylesheet" type = "text/css" href = "css/cadastroAlimentoReceita.css" />
</head>

<body>
<div class="wrapper">
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand" href="../interface_consulta/buscaAlimento.php">Início </a>
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


    <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceGerenciamento.php">Interface de Gerenciamento</a></span> > <span id="pCaminhoAtual">Cadastrar Alimento Receita</span></p>
    <hr size="20">

    <div id="divTitulo">
        <h1><strong>Cadastrar Alimento Receita</strong></h1>
    </div>
    <br>

    <div id="divForm">
        <form action="../../Model/sqlInsertAlimentoReceita.php" method="POST">
           
            <div id="divIndividuoData">
                <div id="div-numero-avaliacao">
                    <label>Nome do Alimento: </label>
                </div>
                <div id="div-input-numero-avaliacao">
                    <input id="input-nome" type="text" name="input-nome" placeholder="" class="form-control">
                </div>

                <div id="div-data">
                    <div id="divDataPicker">
                        <label>Gramas:</label>
                    </div>
                    <div id="div-input-gramas">
                       <input type="number" min="0" step="0.01" class="form-control" id="inputGramas" name="inputGramas" placeholder="">
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
                            <label for="inputQntd">Quantidade:</label>
                            <input type="number" name="quantidades[]" min="0" step="0.01" class="form-control" id="inputQntd" placeholder="">
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

</div>

    <div class="footer-class">
    <!-- Footer -->
    <footer id="footer" class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            © 2019 Copyright | Jaine Conceição e Raul Andrade
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </div>

</body>

</html>