$(function () {

    var validacao = true;

    var _construct = function () {

        salvar();
        buscaDistritos();
        mascarasForm();

    };

    var salvar = function () {

        $('form[name=formulario]').on('submit', function (e) {
            e.preventDefault(e);

            if (validacao != false) {

                validacao = false;

                var dados = {};

                dados.nome = $('#nome').val();
                dados.telefone = $('#telefone').val();
                dados.cpf_cnpj = $('#cpf_cnpj').val();
                dados.rg = $('#rg').val();
                dados.orgaoex = $('#orgaoex').val();
                dados.nasc = $('#nasc').val();
                dados.municipio = $('#municipio').val();
                dados.distrito = $('#distrito').val();
                dados.rua = $('#rua').val();
                dados.bairro = $('#bairro').val();
                dados.numero = $('#numero').val();
                dados.complemento = $('#complemento').val();

                console.log(dados);

                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'ajaxCliente',
                    data: {
                        acao: 'salvarcliente',
                        dados: dados
                    },
                    dataType: 'text',
                    success: function (retorno) {
                        console.log(retorno);
                        if (retorno == 0) {
                            alert('Não salvo. Cliente existe!');
                            window.location.reload();
                        }

                        if (retorno > 0) {
                            alert('Salvo!');
                            window.location.href = BASE_URL+'/clienteedit?id='+retorno;
                        }
                    }
                });


            }
        });
    };

    var buscaDistritos = function () {

        $('#municipio option').on('click', function () {

            var dados = {
                id: $('#municipio').val()
            };

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'ajax',
                data: {
                    acao: 'carregardistritos',
                    dados: dados
                },
                dataType: 'json',
                success: function (retorno) {
                    var html = '<option value="1">Nenhum</option>';
                    $.each(retorno, function (i, v) {
                        html += '<option value="' + v['id'] + '">' + v['nome'] + '</option>';
                    });
                    $('#distrito').html(html);
                }
            });
        });
    };

    var mascarasForm = function () {

        $("#nome").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });

        $("#orgaoex").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z /\u00c0-\u00FF]/g, "");
            $(this).val(val.toLocaleUpperCase());
        });

        $("#telefone").on('keyup', function () {
            var val = $(this).val().replace(/[^0-9]/g, "");
            $(this).val(val);
            $(this).mask("(99) 9999-9999");
        });

        $("#cpf_cnpj").on('keyup', function () {
            var val = $(this).val().replace(/[^0-9\u00c0-\u00FF]/g, "");
            $(this).val(val);
            $(this).mask("999.999.999-99");
        });

        $("#rg").on('keyup', function () {
            var val = $(this).val().replace(/[^0-9\u00c0-\u00FF]/g, "");
            $(this).val(val);
            $(this).mask("99.999.999-9");
        });

    };

    _construct();
});