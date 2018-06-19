$(function () {

    var _construct = function () {
        listar();
    };

    var popup = function () {

        $(".tabela .resultados table tr td:last-child .opcoes").click(function () {
            $(".popup").css("display", "flex");
        });

        $(".popup .container .top i").click(function () {
            $(this).parent().parent().parent().fadeOut(300);
        });
    };


    var listar = function () {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxSolicitacoes',
            data: {
                acao: 'listartodos'
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {
                if (retorno.length > 0) {
                    limparhtml();

                    $.each(retorno, function (i, v) {
                        preencherHtml(v);
                    });

                    popup();
                }
            }
        });
    };

    var preencherHtml = function (v) {

        var html = '<tr><td><i class="' + v['status'] + '"></i></td>' +
            '                <td>'+v['nome']+'</td>' +
            '                <td>' + v['agendamento'] + '</td>' +
            '                <td>' + v['previsao'] + '</td>' +
            '                <td>' + v['nome_tecnico'] + '</td>' +
            '                <td style="width: 80px">' +
            '                    <a href="'+BASE_URL+'solicitacao?id='+v['id_solicitacao']+'" target="_blank"><i class="fa fa-eye"></i></a>' +
            '                    <i class="fa fa-cog opcoes" id="'+v['id_solicitacao']+'"></i>' +
            '                </td></tr>';


        $("#solicitacoes_items").append(html);

    };

    var limparhtml = function () {

        $("#solicitacoes_items").html("");

    };

    _construct();

});