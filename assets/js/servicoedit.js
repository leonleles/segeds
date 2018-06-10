$(function () {

    var validacao = true;

    var _construct = function () {
        salvar();
        mascaraNome();
    };

    var salvar = function () {

        $("#save-servico").on('click', function () {

            if (validacao != false) {

                validacao = false;

                $(this).attr('id', '');
                $(this).css('opacity', 0.5);

                var nome = $('#nome').val();
                var id = $("#id").val();

                if (nome != null && nome != '') {

                    var ativo = '';

                    if ($('#ativo').is(':checked')) {

                        ativo = 1;

                    } else {
                        ativo = 0;
                    }

                    var dados = {
                        nome: nome,
                        ativo: ativo,
                        id: id
                    };

                    $.ajax({
                        type: 'POST',
                        url: BASE_URL + 'ajaxServico',
                        data: {
                            acao: 'salvar',
                            dados: dados
                        },
                        dataType: 'json',
                        success: function (retorno) {
                            console.log(retorno);
                            alert(retorno.msg);

                            if(retorno.id > 0){
                                window.location.href = BASE_URL+'/servicoedit?id='+retorno.id;
                            }else{
                                window.location.reload();
                            }

                        }
                    });
                } else {
                    $('#nome').css('border-color', 'red').focus();
                    alert('Campo Obrigatório!');
                    $(this).css('opacity', 1);
                }
            }
        });
    };

    var mascaraNome = function () {

        $("#nome").on('keyup', function () {
            var val = $(this).val().replace(/[^0-9a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });
    };


    _construct();
});