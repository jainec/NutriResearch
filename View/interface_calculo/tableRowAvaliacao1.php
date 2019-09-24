<tr id="addr0">

    <td style="display: none;">
        <div id="divRefeicao" class="form-group">
            <label for="selectRefeicao">Refeição:</label>
            <select id="selectRefeicao" class="form-control" name="refeicoes[]">
                <option value=1> </option>
            </select>
        </div>
    </td>

    <td>
        <div id="divAvaliacoes">

            <div id="" class="form-group">
                <label for="horario">Horário:</label>
                <input id="horario" name="horarios[]" class="form-control" type="time">
            </div>
    </td>

    <td>
        <div id="" class="form-group">
            <label for="inputAlimento">Alimento:<span style="color: red;">*</span></label>
            <select id="inputAlimento" class="form-control" name="alimentos[]">
                <?php

                include '../../Model/sqlSelectAlimentoDropDown.php';
                while ($row_list = pg_fetch_assoc($result)) {
                    echo '<option value="' . $row_list['id_alimento'] . '"> ' . $row_list['tx_nome'] . ' </option>';
                }
                ?>
            </select>
        </div>
    </td>

    <td>
        <div id="" class="form-group">
            <label>Medida:<span style="color: red;">*</span></label>
            <select id="selectMedida" class="form-control" name="medidas[]">
                <?php

                include '../../Model/sqlSelectMedidaAvaliacao.php';
                while ($row_list = pg_fetch_assoc($result)) {
                    echo '<option value="' . $row_list['id_medida'] . '"> ' . $row_list['tx_descricao'] . ' </option>';
                }
                ?>
            </select>
        </div>
    </td>

    <td>
        <div id="">
            <label for="inputQntd">Quantidade:<span style="color: red;">*</span></label>
            <input type="number" name="quantidades[]" min="0" step="0.01" class="form-control" id="inputQntd" placeholder="" required value=0>
        </div>
    </td>

    <td>
        <div id="" class="form-group">
            <label for="local">Local da refeição:</label>
            <input id="local" name="locais[]" class="form-control" type="text">
        </div>
    </td>

    <td>
        <div id="" class="form-group">
            <label for="marca">Marca:</label>
            <input id="marca" name="marcas[]" class="form-control" type="text">
        </div>
        </div>
    </td>
    <td><a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
</tr>