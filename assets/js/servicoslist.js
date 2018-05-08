$(function () {

    var _construct = function () {
        buscarhtml();
    };

    var buscarhtml = function () {

        $('#filtro_busca').keyup(function () {
            var nomeFiltro = $(this).val().toLowerCase();
            $('.tabelacliente tbody').find('tr').each(function () {
                var conteudoCelula = $(this).find('td:first').text();
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                $(this).css('display', corresponde ? '' : 'none');
            });
        });
    };
    _construct();
});