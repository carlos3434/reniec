var Sueldos={
    get:function(callback){
        $.get( 'sueldos',
        function(response) {
            callback(response.data);
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
    }
};