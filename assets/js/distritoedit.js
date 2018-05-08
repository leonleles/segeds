$(function () {

    var salvar = true;

    var _construct = function () {
        add_municipio();
        mascaraNome();
    };

    var add_municipio = function () {

        $("#save-distrito").on('click', function () {

            if (salvar != false) {

                salvar = false;

                $(this).attr('id', '');
                $(this).css('opacity', 0.5);

                var nome = $('#nome-distrito').val();

                if (nome != null && nome != '') {

                    var ativo = '';

                    if ($('#ativo_distrito').is(':checked')) {

                        ativo = 1;

                    } else {
                        ativo = 0;
                    }


                    var id = $('input[name=id_distrito]').val();
                    var municipio = $('#id_municipio').val();

                    var dados = {
                        nome: nome,
                        ativo: ativo,
                        municipio: municipio,
                        id: id
                    };

                    console.log(dados);

                    $.ajax({
                        type: 'POST',
                        url: BASE_URL + 'ajax',
                        data: {
                            acao: 'editarDistrito',
                            dados: dados
                        },
                        dataType: 'text',
                        success: function (retorno) {

                            alert('Salvo!');
                            $('.save-municipio').attr('id', 'save-distrito');
                            $(this).css('opacity', 1);
                            window.location = BASE_URL + 'distritoedit?id=' + id;

                        }
                    });
                } else {
                    $('#nome-distrito').css('border-color', 'red').focus();
                    alert('Campo Obrigatório!');
                    $(this).css('opacity', 1);
                }
            }
        });
    };

    var mascaraNome = function () {

        $("#nome-distrito").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });
    };


    _construct();
});