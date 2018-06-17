$(function () {

    $("#form_login").on('submit', function (e) {
        e.preventDefault();

        $("#msg").html("").fadeOut(300);

        var login = $('input[name=login]').val();
        var senha = $('input[name=senha]').val();

        var dados = {login: login, senha: senha};

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxUsuario',
            data: {
                acao: 'login',
                dados: dados
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {

                if(retorno){
                    if(retorno['condicao'] == false){
                        $("#msg").html(retorno['msg']).fadeIn(300);
                    }else{
                        location.reload();
                    }
                }
            }
        })

    })

});