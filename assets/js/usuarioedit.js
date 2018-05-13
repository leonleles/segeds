$(function () {

    var validacao = true;
    var senhaok = "";

    var _construct = function () {
        salvar();
        mascaraNome();
        verificasenha();


        var id = $("#id").val();

        if (id != null && id != "") {
            senhaok = $("#senhaconfirm").val().trim();
        }

    };

    var verificasenha = function () {

        $("#senhaconfirm").on('keyup', function () {

            if ($(this).val().trim() == $("#senha").val().trim()) {
                $("#msgsenha2").text("As senha conferem!").css({color: "green"}).fadeIn(300);
                senhaok = $(this).val().trim();
                validacao = true;
            } else if ($(this).val().trim() != $("#senha").val().trim()) {
                $("#msgsenha2").text("As senha não conferem!").css({color: "red"}).fadeIn(300);
                senhaok = "";
                validacao = false;
            }

        });


        $("#senha").on('keyup', function () {

            senhaok = "";

            $("#msgsenha2").text("As senha não conferem!").css({color: "red"}).fadeIn(300);

            if ($(this).val().length < 6) {
                $("#msgsenha1").text("Senha curta (Mínimo 6 caracteres)!").css({color: "red"}).fadeIn(300);
                validacao = false;
            }else{
                $("#msgsenha1").text("Senha válida!").css({color: "green"}).fadeOut(6000);
                validacao = true;
            }

        });

    };

    var salvar = function () {

        $("#formulario").on('submit', function (e) {
            e.preventDefault(e);

            if (validacao != false) {

                validacao = false;

                var nome = $('#nome').val();
                var login = $('#login').val();
                var tipo = $('#tipo').val();
                var id = $("#id").val();

                console.log(senhaok);

                if (senhaok != "" && $("#senha").val().length >= 6) {

                    var ativo = '';

                    if ($('#ativo').is(':checked')) {

                        ativo = 1;

                    } else {
                        ativo = 0;
                    }

                    var dados = {
                        nome: nome,
                        login: login,
                        senha: senhaok,
                        tipo_id: tipo,
                        ativo: ativo,
                        id: id
                    };

                    console.log(dados);

                    $.ajax({
                        type: 'POST',
                        url: BASE_URL + 'ajaxUsuario',
                        data: {
                            acao: 'salvar',
                            dados: dados
                        },
                        dataType: 'json',
                        success: function (retorno) {
                            console.log(retorno);
                            alert(retorno.msg);

                            if (retorno.id > 0) {
                                window.location.href = BASE_URL + 'usuarioedit?id=' + retorno.id;
                            } else {
                                window.location.reload();
                            }

                        }
                    });
                }else{
                    if($("#senha").val().trim().length < 6){
                        $("#msgsenha1").text("Senha curta (Mínimo 6 caracteres)!").css({color: "red"}).fadeIn(300);
                        validacao = true;
                    }
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