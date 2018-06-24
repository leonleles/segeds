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

    var salvar = function () {

        $("#formulario").on('submit', function (e) {
                e.preventDefault(e);


                validacao = false;

                var nome = $('#nome').val();
                var login = $('#login').val();
                var tipo = $('#tipo').val();
                var id = $("#id").val();
                var ativo = $("#ativo").val();
                var senhaatual = $("#senhaatual").val();

                var dados = {
                    nome: nome,
                    login: login,
                    senhaatual: senhaatual,
                    senha: senhaok,
                    tipo_id: tipo,
                    ativo: ativo,
                    id: id
                };

                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'ajaxUsuario',
                    data: {
                        acao: 'salvarperfil',
                        dados: dados
                    },
                    dataType: 'json',
                    async: false,
                    success: function (retorno) {
                        alert(retorno.msg);
                        window.location.reload();
                    }
                });
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