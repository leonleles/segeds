$(function () {

    var salvar = true;

    var construct = function () {
        add_distrito();
        add_municipio();
        salvarTodos();
        carregarDistritos();
        redirecionarEdit();
        redirecionarEditDistrito();
        buscarhtml();
        mascarasForm();
    };

    var add_distrito = function () {

        $("#add-distrito").on('click', function () {

            var municipio = $('.select-municipio').val();

            if (municipio != null) {

                var nome = $('#input-distrito').val();
                var verificacao = false;

                $('main .form-group table tbody tr .nome_distrito').each(function () {

                    if ($(this).text().toLowerCase()  == nome.toLowerCase() ) {

                        verificacao = true;

                    }

                });

                if (nome != null && nome != '') {
                    if (verificacao == false) {

                        var html = '' +
                            '        <tr style="background-color: #ffc9a4">' +
                            '            <td class="nome_distrito">' + nome + '</td>' +
                            '            <td><input id="distrito-ativo" type="checkbox" checked="checked"></td>' +
                            '            <td class="remover-distrito id-distrito" id=""><i class="fa fa-trash"></i></td>' +
                            '        </tr>';

                        preencherTabela(html, 0);

                    } else {
                        $('#input-distrito').val('').focus();
                        alert('Registro já existe!');
                    }

                } else {

                    $('#input-distrito').css('border-color', 'red').focus();
                    alert('Campo obrigatório!');
                }
            } else {
                alert('É necessário um município');
            }
        });

    };

    var remover_distrito = function () {

        $('table tbody tr .remover-distrito').on('click', function () {

            $(this).parent().fadeOut(200, function () {

                $(this).remove();

            });

        });

    };

    var add_municipio = function () {

        $("#add-municipio").on('click', function () {

            $(this).attr('id', '');
            $(this).css('opacity', 0.5);

            var nome = $('#nome-municipio').val();

            if (nome != null && nome != '') {

                var dados = {nome: nome};

                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'ajax',
                    data: {
                        acao: 'salvarMunicipio',
                        dados: dados
                    },
                    dataType: 'json',
                    async: false,
                    success: function (retorno) {

                        $(this).attr('id', 'add-municipio');
                        $(this).css('opacity', 1);

                        console.log(retorno);

                        if (retorno > 0) {
                            window.location = BASE_URL + 'localidadelist';
                        } else if (retorno == 'duplicate') {
                            $('#nome-municipio').focus();
                            alert('Registro já existe!');
                        }
                        else {
                            alert('Erro ao salvar!');
                        }
                    }
                });
            } else {
                $('#nome-municipio').css('border-color', 'red').focus();
                alert('Campo Obrigatório!');
                $(this).css('opacity', 1);
            }


        });

    };

    var preencherTabela = function (html, tipo) {

        if (tipo == 0) {
            $('table tbody').append(html);
            remover_distrito();
        }
        if (tipo == 1) {
            $('table tbody').html(html);
        }


    };

    var salvarTodos = function () {

        $('#salvar-todos').on('click', function () {

            var distritos = [];

            var municipio = $('.select-municipio').val();

            if (municipio != null) {

                $('main .form-group table tbody tr').each(function (i, v) {

                    var nome = $(this).find('.nome_distrito').text();

                    if (nome != null && nome != '') {

                        var ativo = $(this).find("input[id='distrito-ativo']:checked").val();
                        var id = $(this).find('.id-distrito').attr('id');

                        if (ativo == 'on') {
                            ativo = 1;
                        } else {
                            ativo = 0;
                        }

                        var dis = {
                            nome: nome,
                            ativo: ativo,
                            id: id,
                            municipio: municipio
                        };

                        distritos.push(dis);


                    } else {
                        $(this).find('.nome_distrito').css('border-color', 'red');
                        alert('É necessário um nome!');
                    }

                });

            } else {
                alert('Crie um municipio e seus distristos!');
            }

            if (distritos.length > 0) {
                salvarDistrito(distritos);
            } else {
                alert('Adicione distritos antes de salvar!');
                $('#input-distrito').css('border-color', 'red').focus();
            }

        });
    };

    var salvarDistrito = function (distritos) {

        if (salvar != false) {

            salvar = false;

            $('#salvar-todos').prop('disable');

            var dados = {
                    distritos: distritos
                }
            ;

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'ajax',
                data: {
                    acao: 'salvarDistrito',
                    dados: dados
                },
                dataType: 'json',
                async: false,
                success: function (retorno) {

                    if (retorno.length > 0) {
                        alert('Salvo!');
                        window.location = BASE_URL + 'localidadelist';
                    }
                    else {
                        alert('Erro ao salvar!');
                    }
                }
            });

        }
    };

    var carregarDistritos = function () {

        $('.select-municipio option').on('click', function () {

            var dados = {
                id: $('.select-municipio').val()
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


                    console.log(retorno);

                    if (retorno.length > 0) {

                        var html = '';

                        $.each(retorno, function (i, v) {

                            if (v['ativo'] == 1) {
                                v['ativo'] = 'checked=checked';
                            } else {
                                v['ativo'] = '';
                            }


                            html += '' +
                                '        <tr>' +
                                '            <td class="nome_distrito">' + v['nome'] + '</td>' +
                                '            <td><input id="distrito-ativo" type="checkbox" ' + v['ativo'] + '></td>' +
                                '            <td class="id-distrito editar-distrito" id="' + v['id'] + '"><i class="fa fa-edit"></i></td>' +
                                '        </tr>';

                        });

                        preencherTabela(html, 1);
                        redirecionarEditDistrito();
                        buscarhtml();

                    } else {
                        preencherTabela('', 1);
                    }
                }
            });

        });
    };

    var redirecionarEdit = function () {

        $('#click-edit-municipio').on('click', function () {

            var id = $('.select-municipio').val();

            if (id != null) {

                window.location = BASE_URL + 'municipioedit?id=' + id;
            } else {
                alert('É necessário adicionar um município!');
                $('#nome-municipio').css('border-color', 'red').focus();
            }

        });


    };

    var redirecionarEditDistrito = function () {

        $('.editar-distrito').on('click', function () {

            var id = $(this).attr('id');

            window.location = BASE_URL + 'distritoedit?id=' + id;

        });

    };

    var buscarhtml = function () {

        $('#filtro_busca').keyup(function () {
            var nomeFiltro = $(this).val().toLowerCase();
            $('table tbody').find('tr').each(function () {
                var conteudoCelula = $(this).find('td:first').text();
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                $(this).css('display', corresponde ? '' : 'none');
            });
        });
    };

    var mascarasForm = function () {

        $("#nome-municipio").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });

        $("#input-distrito").on('keyup', function () {
            var val = $(this).val().replace(/[^a-zA-Z \u00c0-\u00FF]/g, "");
            $(this).val(val);
        });
    };

    construct();

});