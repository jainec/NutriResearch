  <tr id="addr0"><td><div id="divAvaliacoes">
    <div id="divAvaliacao">
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

    

