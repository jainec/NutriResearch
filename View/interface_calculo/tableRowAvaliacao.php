  <tr id="addr0"><td><div id="divAvaliacoes">
    <div id="divAvaliacao">
        <div id="divRefeicao" class="form-group">
            <label for="selectRefeicao">Refeição:</label>
            <select id="selectRefeicao" class="form-control" name="refeicoes[]">
                <?php  
                    include '../../Model/sqlSelectRefeicao.php';
                    while($row_list=pg_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row_list['id_refeicao'];?>"> <?php echo $row_list['tx_descricao'];?> </option>
                <?php 
                    }
                ?>
            </select>           
        </div>
        <div id="divAlimento" class="form-group">
            <label for="inputAlimento">Alimento:</label>
             <select id="inputAlimento" class="form-control" name="alimentos[]">
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
                
                    include '../../Model/sqlSelectMedidaCaseira.php';
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

    
