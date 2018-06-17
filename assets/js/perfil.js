$(function () {

    var validacao = true;
    var senhaok = "";
    var senha_atual = false;

    var _construct = function () {
        salvar();
        mascaraNome();
        verificasenha();

    };

    var verificasenha = function () {

        $("#senhaconfirm").on('keyup', function () {

            if ($(this).val().trim() == $("#senha").val().trim()) {
                $("#msgsenha2").text("As senha conferem!").css({color: "green"}).fadeIn(300);
                senhaok = $(this).val().trim();
                validacao = true;
            } else {
                $("#msgsenha2").text("As senha não conferem!").css({color: "red"}).fadeIn(300);
                senhaok = null;
                validacao = false;
            }

        });


        $("#senha").on('keyup', function () {

            senhaok = null;

            $("#msgsenha2").text("As senha não conferem!").css({color: "red"}).fadeIn(300);

            if ($(this).val().length < 6) {
                $("#msgsenha1").text("Senha curta (Mínimo 6 caracteres)!").css({color: "red"}).fadeIn(300);
                validacao = false;
            } else {
                $("#msgsenha1").text("Senha válida!").css({color: "green"}).fadeOut(6000);
                validacao = true;
            }

        });

    };


    var senhaatual = function () {

        var dados = {};

        dados.senha = $("#senhaatual").val().trim();

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxUsuario',
            data: {
                acao: 'senhaatual',
                dados: dados
            },
            dataType: 'text',
            async: false,
            success: function (retorno) {
                senha_atual = retorno
            }
        });

    };

    var salvar = function () {

        $("#formulario").on('submit', function (e) {
                e.preventDefault(e);


                validacao = false;

                var nome = $('#nome').val();
                var login = $('#login').val();
                var tipo = $('#tipo').val();
                var id = $("#id").val();
                var ativo = $("#ativo").val();

                senhaok = null;

                console.log(validacao);

                if (validacao != false) {

                    if ($("#senha").val().trim() != null && $("#senha").val().trim() != "" && $("#senhaconfirm").val().trim() != null && $("#senhaconfirm").val().trim() != "") {
                        senhaatual();
                        if (senha_atual != false) {
                            senhaok = $("#senha").val().trim();
                        } else {
                            $("#msgsenha3").fadeIn(300);
                        }
                    }
                }

                var dados = {
                    nome: nome,
                    login: login,
                    senha: senhaok,
                    tipo_id: tipo,
                    ativo: ativo,
                    id: id
                };

                // $.ajax({
                //     type: 'POST',
                //     url: BASE_URL + 'ajaxUsuario',
                //     data: {
                //         acao: 'salvarperfil',
                //         dados: dados
                //     },
                //     dataType: 'json',
                //     async: false,
                //     success: function (retorno) {
                //         alert(retorno.msg);
                //
                //         if (retorno.id > 0) {
                //             window.location.href = BASE_URL + 'usuarioedit?id=' + retorno.id;
                //         } else {
                //             window.location.reload();
                //         }
                //
                //     }
                // });
            }
        );
    };

    var mascaraNome = function () {

        $("#nome").on('keyup', function () {
            var val = $(this).val().replace(/[^0-9a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });

        $("#senhaatual").on('focus', function () {
            $("#msgsenha3").fadeOut(300);
        });
    };


    _construct();
})
;