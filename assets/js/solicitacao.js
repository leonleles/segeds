$(function () {

    var _construct = function () {

        salvar();

    };

    var salvar = function () {

        $("#save-solicitacao").click(function () {

            var dados = {};
            dados.id = $("#id").val();
            dados.cliente_id = $("#cliente").val();
            dados.servico_id = $("#servico").val();
            dados.tecnico_id = $("#tecnico").val();
            dados.agendamento = $("#agendamento").find("input[type=date]").val() + " " + $("#agendamento").find("input[type=time]").val();

            if ($('#ativo').is(':checked')) {

                dados.ativo = 1;

            } else {
                dados.ativo = 0;
            }

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'ajaxSolicitacao',
                data: {
                    acao: 'salvar',
                    dados: dados
                },
                dataType: 'json',
                success: function (retorno) {
                    console.log(retorno);

                    // if(retorno.id > 0){
                    //     window.location.href = BASE_URL+'/servicoedit?id='+retorno.id;
                    // }else{
                    //     window.location.reload();
                    // }

                }
            });


        });

    };


    _construct();

});