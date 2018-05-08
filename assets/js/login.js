$(function () {

    $("#form_login").on('submit', function (e) {
        e.preventDefault();

        var user = $('input[name=user]').val();
        var pass = $('input[name=pass]').val();

        var dados = {user: user, pass: pass};

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajax',
            data: {
                acao: 'login',
                dados: dados
            },
            dataType: 'json',
            success: function (retorno) {
                if (retorno.condicao) {
                    window.location = BASE_URL + 'home';
                } else {
                    alert(retorno.msg);
                }
            }
        })

    })

});