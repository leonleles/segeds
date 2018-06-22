$(function () {

    var _construct = function () {
        listar();
        filtro();
    };

    var popup = function () {

        $(".tabela .resultados table tr td:last-child .opcoes").click(function () {
            $(".popup").css("display", "flex");
        });

        $(".popup .container .top i").click(function () {
            $(this).parent().parent().parent().fadeOut(300);
        });
    };


    var listar = function (dados) {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxSolicitacoes',
            data: {
                acao: 'listartodos',
                dados: dados
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {
                console.log(retorno);
                limparhtml();
                if (retorno.length > 0) {

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
            '                <td>' + v['nome_cliente'] + '</td>' +
            '                <td>' + v['agendamento'] + '</td>' +
            '                <td>' + v['previsao'] + '</td>' +
            '                <td>' + v['nome_tecnico'] + '</td>' +
            '                <td style="width: 80px">' +
            '                    <a href="' + BASE_URL + 'solicitacao?id=' + v['id_solicitacao'] + '" target="_blank"><i class="fa fa-eye"></i></a>' +
            '                    <i class="fa fa-cog opcoes" id="' + v['id_solicitacao'] + '"></i>' +
            '                </td></tr>';


        $("#solicitacoes_items").append(html);

    };

    var limparhtml = function () {

        $("#solicitacoes_items").html("");

    };

    var filtro = function () {

        $("#filtrar").click(function (e) {
            e.preventDefault();

            var dados = {};

            dados.tecnico = $("#tecnicos").val();
            dados.cliente = $("#clientes").val();
            dados.servico = $("#servicos").val();
            dados.status = $("#select_status").val();

            if(dados.status == ""){
                dados.status = null;
            }

            listar(dados);

        });

    };

    _construct();

});