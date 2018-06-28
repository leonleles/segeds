$(function () {

    var id_notificacao = null;
    var id_notificacoes = null;

    var _construct = function () {
        logout();
        notificacoes();
        removericon();
        setInterval(function () {
            notificacoes();
        }, 5000);
        setInterval(function () {
            notificar();
        }, 10000);
    };


    var logout = function () {

        $("#logout").on('click', function (e) {
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'ajaxUsuario',
                data: {
                    acao: 'logout'
                },
                dataType: 'json',
                async: false,
                success: function (retorno) {

                    if (retorno > 0) {
                        location.reload();
                    } else {
                        alert("Error!");
                    }
                }
            })
        });
    };

    var notificacoes = function () {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxNotificacoes',
            data: {
                acao: 'listar',
                dados: {id: id_notificacao}
            },
            dataType: 'json',
            async: true,
            success: function (retorno) {
                console.log(retorno);
                if (retorno.length > 0) {
                    $("#circulo_notificacoes").show();
                    id_notificacao = retorno[retorno.length - 1]['id_agendamento'];
                    $.each(retorno, function (i, v) {
                        preencherhtmlNotificacao(v);
                    });
                }
            }
        })
    };

    var notificar = function () {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxNotificacoes',
            data: {
                acao: 'notifica',
                dados: {id: id_notificacoes}
            },
            dataType: 'json',
            async: true,
            success: function (retorno) {
                console.log(retorno);
                if (retorno.length > 0) {
                    $("#circulo_notificacoes").show();
                    id_notificacoes = retorno[retorno.length - 1]['id_agendamento'];
                    $.each(retorno, function (i, v) {
                        preencherhtmlNotificacao2(v);
                    });
                }
            }
        })
    };

    var preencherhtmlNotificacao = function (v) {

        var html = '<a class="dropdown-item" href="' + BASE_URL + 'solicitacaoview?id=' + v['id_solicitacao'] + '" target="_blank">' +
            '           <span class="text-warning">' +
            '                <strong>Solicitação de ' + v['nome'] + ' atrasa hoje</strong>' +
            '           </span>' +
            '           <span class="small float-right text-muted">' + v['agendamento'] + '</span>' +
            '              <div class="dropdown-message small">' +
            '           </div>' +
            '        </a>';

        setHtml(html);

    };

    var preencherhtmlNotificacao2 = function (v) {

        var html = '<a class="dropdown-item" href="' + BASE_URL + 'solicitacaoview?id=' + v['id_solicitacao'] + '" target="_blank">' +
            '           <span class="text-info">' +
            '                <strong>' + v['mensagem'] + '</strong>' +
            '           </span>' +
            '           <span class="small float-right text-muted">' + v['emissao'] + '</span>' +
            '              <div class="dropdown-message small">' +
            '           </div>' +
            '        </a>';

        setHtml(html);

    };

    var setHtml = function (html) {
        $("#notificacoes").append(html);
    };

    var limparHtml = function(){
        $("#notificacoes").html("");
    };

    var removericon = function () {

        $("#alertsDropdown").click(function () {
            $("#circulo_notificacoes").hide();
        });

    };

    _construct();

});