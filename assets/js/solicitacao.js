$(function () {


    var verificacao_cliente = 'false';
    var verificacao_horario = 'false';
    var verificacao_data = 'false';

    var _construct = function () {

        salvar();

    };

    var verificarHorario = function () {
        $("#msghorario").fadeOut(300).html("");

        var dados = {};
        dados.tecnico_id = $("#tecnico").val();
        dados.agendamento = $("#agendamento").find("input[type=date]").val() + " " + $("#agendamento").find("input[type=time]").val();
        dados.previsao = $("#previsao").find("input[type=date]").val() + " " + $("#previsao").find("input[type=time]").val();
        dados.id_agendamento = $("#id_agendamento").val();

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxSolicitacao',
            data: {
                acao: 'verificarhorario',
                dados: dados
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {
                if (retorno > 0) {
                    verificacao_horario = 'false';
                    $("#msghorario").fadeIn(300).html("Horário insdisponível para este técnico. Verifique suas solicitações <a href='" + BASE_URL + "home'>aqui.</a>");
                } else {
                    verificacao_horario = 'true';
                    $("#msghorario").fadeOut(300).html("");
                }
            }
        });

        if ($("#id").val() == null) {
            if (dados.agendamento < $("#dataatual").val()) {
                verificacao_horario = 'false';
                alert("Agendamento não pode ser menor que horário atual.");
            }
        }

    };

    var verificarCliente = function () {

        var dados = {};
        dados.cliente_id = $("#cliente").val();
        dados.id_agendamento = $("#id_agendamento").val();

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxSolicitacao',
            data: {
                acao: 'verificarcliente',
                dados: dados
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {
                if (retorno) {
                    verificacao_cliente = retorno['valor'];

                    if (retorno['valor'] != 'true') {
                        $("#msg_cliente").fadeIn(300).html(retorno['msg']);
                    } else {
                        $("#msg_cliente").fadeOut(300).html("");
                    }
                }
            }
        });
    };

    var post = function () {

        var dados = {};
        dados.id = $("#id").val();
        dados.id_agendamento = $("#id_agendamento").val();
        dados.cliente_id = $("#cliente").val();
        dados.servico_id = $("#servico").val();
        dados.tecnico_id = $("#tecnico").val();
        dados.agendamento = $("#agendamento").find("input[type=date]").val() + " " + $("#agendamento").find("input[type=time]").val();
        dados.previsao = $("#previsao").find("input[type=date]").val() + " " + $("#previsao").find("input[type=time]").val();

        if ($('#ativo').is(':checked')) {

            dados.ativo = 1;

        } else {
            dados.ativo = 0;
        }

        if (verificacao_cliente != 'false' && verificacao_horario != 'false' && verificacao_data != 'false') {

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'ajaxSolicitacao',
                data: {
                    acao: 'salvar',
                    dados: dados
                },
                dataType: 'json',
                success: function (retorno) {
                    alert(retorno['msg']);
                    if (retorno.id > 0) {
                        window.location.href = BASE_URL + '/solicitacao?id=' + retorno.id;
                    } else {
                        window.location.reload();
                    }
                }
            });
        } else {
            alert("Dados inválidos.");
        }
    };

    var verificaragenda = function () {
        var agendamento = $("#agendamento").find("input[type=date]").val() + " " + $("#agendamento").find("input[type=time]").val();
        var previsao = $("#previsao").find("input[type=date]").val() + " " + $("#previsao").find("input[type=time]").val();

        if (agendamento != previsao && previsao > agendamento) {
            verificacao_data = 'true';
        } else {
            verificacao_data = 'false';
            alert("Previsão deve ser maior que agendamento!");
        }
    };

    var salvar = function () {

        $("#formulario").submit(function (e) {
            e.preventDefault();

            verificarCliente();
            verificarHorario();
            verificaragenda();
            post();

        });
    };

    _construct();

});