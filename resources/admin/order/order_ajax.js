var Pedido={


    all:function(dataUsers){
        $.ajax( {
            url: 'pedido',
            type: 'get',
            headers: {
                "token":document.querySelector('#token').getAttribute('value')
            },
            dataType: 'json',
            success: function (data) {
                console.info(data);
                dataUsers();
            }
        });
    },
    get:function(id){
        $.ajax( {
            url: 'pedido/'+id,
            type: 'get',
            headers: {
                "token":document.querySelector('#token').getAttribute('value')
            },
            dataType: 'json',
            success: function (data) {
                console.info(data);
                //dataUsers();
            }
        });
    },
    allPaginate:function(dataUsersPag){
        $.post( "user/all-paginate",
        { name: "John", time: "2pm" },
        function(response) {
            dataUsersPag(response);
            //alert( "success" );
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    CambiarEstadoAreas:function(id,AD){

    }
};