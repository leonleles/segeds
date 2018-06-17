$(function () {

    $("#logout").on('click', function (e) {

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'ajaxUsuario',
            data: {
                acao: 'logout'
            },
            dataType: 'json',
            async: false,
            success: function (retorno) {

                if(retorno > 0){
                    location.reload();
                }else{
                    alert("Error!");
                }

            }
        })

    })

});