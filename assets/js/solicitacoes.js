$(function () {

    var alterar_status = true;

    var _construct = function () {
        listar();
        filtro();
    };

    var popup = function () {

        $(".tabela .resultados table tr td:last-child .opcoes").click(function () {
            $(".popup .container .conteudo fieldset .dados").html('<div class="item">Carregando...</div>');
            $(".popup").css("display", "flex");
            listardados($(this).attr('id'));
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
                limparhtml();
                if (retorno.length > 0) {

                    $.each(retorno, function (i, v) {
                        preencherHtml(v);
                    });

                    popup();
                } else {
                    alert("Nenhum resultado.");
                }
            }
        });
    };

    var preencherHtml = function (v) {
        var link = "";

        if (tipo_id > 4) {
            link = "solicitacaoview";
        } else {
            link = "solicitacao";
        }

        var html = '<tr><td><i class="' + v['status'] + '"></i></td>' +
            '                <td>' + v['nome_cliente'] + '</td>' +
            '                <td class="' + v['status'] + '">' + v['agendamento'] + '</td>' +
            '                <td>' + v['previsao'] + '</td>' +
            '                <td>' + v['nome_tecnico'] + '</td>' +
            '                <td style="width: 80px">' +
            '                    <a href="' + BASE_URL + link + '?id=' + v['id_solicitacao'] + '" target="_blank"><i class="fa fa-eye"></i></a>' +
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

            if (dados.status == "") {
                dados.status = null;
            }

            listar(dados);

        });

    };

    var listardados = function (id) {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxSolicitacoes',
            data: {
                acao: 'verdados',
                dados: {id: id}
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {
                var elemento = $(".popup .container .conteudo fieldset .dados");

                var html = "<input type='hidden' id='id_agendamentopopup' value='" + retorno.id_agendamento + "'>";

                if (retorno.nome_cliente) {
                    html += "<div class='item'><b>Nome:</b> " + retorno.nome_cliente + "</div>";
                }

                if (retorno.telefone) {
                    html += "<div class='item'><b>Telefone:</b> " + retorno.telefone + "</div>";
                }

                if (retorno.cpf_cnpj) {
                    html += "<div class='item'><b>CPF/CNPJ:</b> " + retorno.cpf_cnpj + "</div>";
                }

                if (retorno.cpf) {
                    html += "<div class='item'><b>CPF/CNPJ:</b> " + retorno.cpf + "</div>";
                }

                if (retorno.municipio) {
                    html += "<div class='item'><b>Município:</b> " + retorno.municipio + "</div>";
                }

                if (retorno.distrito) {
                    html += "<div class='item'><b>Distrito:</b> " + retorno.distrito + "</div>";
                }

                if (retorno.bairro) {
                    html += "<div class='item'><b>Bairro:</b> " + retorno.bairro + "</div>";
                }

                if (retorno.rua) {
                    html += "<div class='item'><b>Rua:</b> " + retorno.rua + "</div>";
                }

                if (retorno.numero) {
                    html += "<div class='item'><b>Número:</b> " + retorno.numero + "</div>";
                }

                if (retorno.complemento) {
                    html += "<div class='item'><b>Complemento:</b> " + retorno.complemento + "</div>";
                }

                elemento.html(html);
                $("#statuspopup").val(retorno.status);

                alterarstatus();
            }
        });
    };

    var alterarstatus = function () {

        $("#alterarstatus").click(function () {

            var dados = {};
            dados.id = $(".popup .container .conteudo fieldset .dados").find("#id_agendamentopopup").val();
            dados.status = $(".popup .container .conteudo").find("#statuspopup").val();

            if (alterar_status != false) {

                alterar_status = false;

                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'ajaxSolicitacoes',
                    data: {
                        acao: 'alterarstatus',
                        dados: dados
                    },
                    dataType: 'json',
                    async: true,
                    success: function (retorno) {
                        console.log(retorno);
                        if (retorno) {
                            alterar_status = true;
                            alert(retorno['msg']);
                            listar();
                        }
                    }
                });
            }
        });

    };

    _construct();

});