  <tr id="addr0">
      <td>
          <label for="inputAlimento<?= $_POST['index'] ?>">Alimento:</label>
          <select id="inputAlimento<?= $_POST['index'] ?>" class="form-control" name="alimentos[]" onchange="getAlimentoId(<?= $_POST['index'] ?>)">
              <option value=-1>Selecione um alimento</option>
              <?php
                $_SESSION['index'] = $_POST['index'];
                include '../../Model/sqlSelectAlimentoDropDown.php';
                while ($row_list = pg_fetch_assoc($result)) {
                    ?>
                  <option value="<?= $row_list['id_alimento'] ?>">
                      <?= $row_list['tx_nome'] ?>
                  </option>
              <?php
                }
                ?>

          </select>
      </td>
      <td>
          <label>Medida:</label>
          <select id="selectMedida<?= $_POST['index'] ?>" class="form-control" name="medidas[]">


          </select>
      </td>
      <td>
          <label for="inputQntd">Quantidade:<span style="color: red;">*</span></label>
          <input type="number" value=0.1 name="quantidades[]" min="0.1" step="0.1" class="form-control" id="inputQntd" placeholder="" required="true">
      </td>
      <td>
          <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
      </td>

  </tr>