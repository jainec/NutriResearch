function tableRow() {
    document.getElementById('tab_logic1').innerHTML = '<tr id="addr0"><td><div id="divAvaliacoes"><div id="" class="form-group"<label for="horario">Horário:</label><?= $row[\'tm_horario\'] ?></div></td><td><div id="" class="form-group"><label for="inputAlimento">Alimento:</label><?= $row[\'tx_nome_alimento\'] ?></div></td><td><div id="" class="form-group"><label>Medida:</label><?= $row[\'tx_descricao_medida\'] ?></div></td><td><div id="">    <label for="inputQntd">Quantidade:</label>    <?= $row[\'fl_quantidade\'] ?></div></td><td><div id="" class="form-group">    <label for="local">Local da refeição:</label><?= $row[\'tx_local_refeicao\'] ?></div></td><td><div id="" class="form-group"><label for="marca">Marca:</label><?= $row[\'tx_marca\'] ?></div></div></td></tr>';
    return;
}