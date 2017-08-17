var Modulos={
    all:function(){
        $.get( "api/modulos",
        function(response) {
            //dataUsers(response);
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
    get:function(id){
        $.get( "api/modulos/"+id,
        function(response) {
            vm.modulo = response;
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
    /** guardar nuevo
    */
    store:function(){
        //vm.rol.submodulos = vm.submodulos;
        $.post( "api/modulos",vm.modulo,
        function(response) {
            reload();
            $("#moduloModal").modal('hide');
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
    /** guardar existente
    */
    update:function(id){
        //vm.rol.submodulos = vm.submodulos;
        $.put('api/modulos/'+id,vm.modulo, 
            function(response){
            reload();
            $("#moduloModal").modal('hide');
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
    destroy:function(id){
        $.delete( "api/modulos/"+id,
        function(response) {
            //user = response;
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