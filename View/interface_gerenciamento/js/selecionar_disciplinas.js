$(document).ready(function () {
    
    var selecionadas = [];

    var obrigatorias = [
        'COMP123 - Teste de Software',
        'COMP124 - Engenharia de Software II',
        'COMP125 - Projeto e Análise de Algoritmos',
        'COMP126 - Grafos e Algoritmos Computacionais',
        'COMP127 - Processamento de Imagem',
        'COMP128 - Programação Imperativa',
        'COMP129 - Programação Orientado a Objetos',
        'COMP129 - Programação Funcional',

    ];

    var optativas = [
        'LETRAS133 - LIBRAS',
        'MAT134 - Algebra Linear Computacional',
        'LETRAS135 - Inglês Instrumental',
        'COMP136 - Informatica Educativa',
        'FIS137 - Física B',
    ];

    var eletivas = [
        'COMP143 - Psicologia I',
        'COMP143 - Cinema II',
        'COMP143 - Artes I',
        'COMP143 - Natação',
        'COMP143 - Direito Penal I',
        'COMP143 - Anatomia II',
    ];

    /* confirmar */
    /*$('#btn_confirmar').click(function () {
        var chklist = $('input[name="disciplinas"]:checked')
            .toArray()
            .map(function (check) {
                selecionadas.append($(check).val());
                return $(check).val();
            });

        console.log(chklist)
    });*/

    function verifica_check() {
        var chklist = $('input[name="disciplinas"]:checked')
        .toArray()
        .map(function (check) {
            return $(check).val();
        });

        selecionadas = $.merge(chklist, selecionadas);
        console.log(selecionadas);
    }

    /* obrigatorias */
    $('#btn_obrigatorias').click(function () {
        verifica_check();

        arr = [];
        $.each(obrigatorias, (index, element) => {
            var li = $('<li class="list-group-item" id=' + index + '></li>');
            var span = $('<span class=""></span>').text(element);
            var checkbox = $('<input name="disciplinas" class="" type="checkbox" id="check' + index + '" value="' + element + '"/>');

            li.append(span);
            li.append(checkbox);
            arr.push(li);
        });

        $('#li_disciplinas').empty();
        $('#li_disciplinas').append(arr);
    });

    /* optativas */
    $('#btn_optativas').click(function () {
        verifica_check();

        arr = [];
        $.each(optativas, (index, element) => {
            var li = $('<li class="list-group-item" id=' + index + '></li>');
            var span = $('<span class=""></span>').text(element);
            var checkbox = $('<input name="disciplinas" class="" type="checkbox" id="check' + index + '" value="' + element + '"/>');

            li.append(span);
            li.append(checkbox);
            arr.push(li);
        });

        $('#li_disciplinas').empty();
        $('#li_disciplinas').append(arr);
    });

    /* eletivas */
    $('#btn_eletivas').click(function () {
        verifica_check();

        arr = [];
        $.each(eletivas, (index, element) => {
            var li = $('<li class="list-group-item" id=' + index + '></li>');
            var span = $('<span class=""></span>').text(element);
            var checkbox = $('<input name="disciplinas" class="" type="checkbox" id="check' + index + '" value="' + element + '"/>');

            li.append(span);
            li.append(checkbox);
            arr.push(li);
        });

        $('#li_disciplinas').empty();
        $('#li_disciplinas').append(arr);
    });

    /* selecionadas */
    $('#btn_selecionadas').click(function () {
        verifica_check();
        arr = [];
        $.each(selecionadas, (index, element) => {
            var li = $('<li class="list-group-item" id=' + index + '></li>');
            var span = $('<span class=""></span>').text(element);
            //var checkbox = $('<input name="disciplinas" class="" type="checkbox" id="check' + index + '" value="' + element + '"/>');
            
            li.append(span);
            //li.append(checkbox);
            arr.push(li);
        });

        $('#li_disciplinas').empty();
        $('#li_disciplinas').append(arr);


    });




    /* side bar */
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });


    arr = [];
    $.each(obrigatorias, (index, element) => {
        var li = $('<li class="list-group-item" id=' + index + '></li>');
        var span = $('<span class=""></span>').text(element);
        var checkbox = $('<input !checked name="disciplinas" class="" type="checkbox" id="check' + index + '" value="' + element + '"/>');

        li.append(span);
        li.append(checkbox);
        arr.push(li);
    });
    $('#li_disciplinas').append(arr);


    /* search */
    $('#input-search').keyup(function () {
        var $rows = $('.list-group li');
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        
        console.log(val);
        $rows.show().filter(function () {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
});
