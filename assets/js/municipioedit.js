$(function () {


    var _construct = function () {
        add_municipio();
        mascaraNome();
    };

    var add_municipio = function () {

        $("#save-municipio").on('click', function () {

            $(this).attr('id', '');
            $(this).css('opacity', 0.5);

            var nome = $('#nome-municipio').val();

            if (nome != null && nome != '') {

                var ativo = '';

                if ($('#ativo_municipio').is(':checked')) {

                    ativo = 1;

                } else {
                    ativo = 0;
                }


                var id = $('input[name=id_municipio]').val();

                var dados = {
                    nome: nome,
                    ativo: ativo,
                    id: id
                };

                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'ajax',
                    data: {
                        acao: 'editarMunicipio',
                        dados: dados
                    },
                    dataType: 'json',
                    success: function (retorno) {

                        alert('Salvo!');
                        $('.save-municipio').attr('id', 'save-municipio');
                        $(this).css('opacity', 1);
                        window.location = BASE_URL + 'municipioedit?id=' + id;

                    }
                });
            } else {
                $('#nome-municipio').css('border-color', 'red').focus();
                alert('Campo Obrigatório!');
                $(this).css('opacity', 1);
            }


        });

    };

    var mascaraNome = function () {

        $("#nome-municipio").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });
    };


    _construct();
});