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
    <title>Visualizar Avaliação</title>
    <link rel="icon" href="icons/nutri_logo3.png">
    <link rel = "stylesheet" type = "text/css" href = "css/visualizarAvaliacao.css" />

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


     <p id="pCaminho">Você está em <span><a class="a-caminho" href="interfaceCalculo.php">Interface de Cálculo</a></span>  > <span><a class="a-caminho" href="meusIndividuos.php">Meus Indivíduos</a></span> > <span><a class="a-caminho" href="visualizarIndividuo.php">Visualizar Indivíduo</a></span>  > <span id="pCaminhoAtual">Visualizar Avaliação</span></p>
    <hr size="20">

    <?php
        include '../../Model/sqlSelectUmaAvaliacao.php';
        $row_list=pg_fetch_assoc($result);
    ?>

    <div id="divTitulo">
        <h1><strong>Avaliação <?php echo $row_list['id_num_avaliacao'] ?></strong></h1>
    </div>

    <div id="divForm">
        <form action="../../Model/sqlInsertAvaliacao.php" method="POST">
            <div id="divIndividuo">
                <!--<?php  
                    include '../../Model/sqlSelectIndividuoPeloId.php';
                    $row=pg_fetch_array($result);
                ?>
                <h5><label><strong>Indivíduo: <span style="color: #97C447;"><?php echo $row['tx_nome']?></span></strong></label></h5>-->
            </div>

           
            
            <div id="divIndividuoData">
                  <?php  
                    include '../../Model/sqlSelectIndividuoPeloId.php';
                    $row=pg_fetch_array($result);
                ?>
                <div id="div-numero-avaliacao">
                     <h5><label><strong>Indivíduo: </strong><span ><?php echo $row['tx_nome']?></span></label></h5>
                </div>
                

                <div id="div-data">
                    <div id="divDataPicker">
                        <h5><label><strong>Data da Avaliação:</strong> <?php echo $row_list['dt_avaliacao'] ?></label></h5>
                    </div>
                    <div id="dataPickerJquery">
                        
                    </div>
                </div>
            </div>


            <?php  
                $i = 1;
                while ($i < 7) {
                    include '../../Model/sqlSelectRefeicao'.$i.'.php';
                    $num_rows = pg_num_rows($result);
                    if($num_rows != 0) {
                        
                        $row_list=pg_fetch_assoc($result);
                        echo '<h5  align="center" style="color:#97C447; font-weight:bold;">' .$row_list['refeicao']. '</h5>';
            ?>
              
                    <div id="div-table-head">
                        <table id="table-head" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Alimento</th>
                                    <th scope="col">Medida</th>
                                    <th scope="col">Quantidade</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="div-table">
                        <table class="table table-striped" id="table">
                          <tbody>
                                <?php  
                                    include '../../Model/sqlSelectRefeicao'.$i.'.php';
                                    while($row_list=pg_fetch_assoc($result)){
                                        echo '<tr><td align="center">'. $row_list['tx_nome'] .'</td> <td align="center">' . $row_list['medida'] .'</td> <td align="center">'. $row_list['fl_quantidade'] .'</td>';
                          
                                    }
                                    echo  '</tr>';
                            ?>
                          </tbody>
                        </table>
                    </div>
                   
            <?php  
                    }
                    $i = $i+1;
                }
            ?>
           
            <hr>

            <div id="divBotoes">
               
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
            url: "tableRowAvaliacao.php",
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