$(function () {

    var _construct = function () {
      popup();
    };

    var popup = function () {

        $(".tabela .resultados table tr td:last-child .opcoes").click(function () {

            $(".popup").css("display", "flex");

        });


        $(".popup .container .top i").click(function () {
            $(this).parent().parent().parent().fadeOut(300);
        });


    };







    _construct();

});