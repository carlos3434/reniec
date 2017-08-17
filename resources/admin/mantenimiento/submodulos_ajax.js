var Submodulos={
    all:function(){
        $.get( "api/submodulos",
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
        $.get( "api/submodulos/"+id,
        function(response) {
            vm.submodulo = response;
            vm.permisos = response.permisos;
            pintarPermisos();
            $selectModulos.val(vm.submodulo.modulo_id).trigger("change");
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
        vm.submodulo.modulo_id = $selectModulos.val();
        $.post( "api/submodulos",vm.submodulo,
        function(response) {
            reload();
            $("#submoduloModal").modal('hide');
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
        vm.submodulo.modulo_id = $selectModulos.val();
        $.put('api/submodulos/'+id,vm.submodulo, 
            function(response){
            reload();
            $("#submoduloModal").modal('hide');
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
        $.delete( "api/submodulos/"+id,
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
var Modulos={
    all:function(){
        $.get( "modulos/lista",
        function(response) {
            vm.modulos = response;
            $selectModulos = $('#modulos').select2({
                dropdownParent: $('#submoduloModal')
            });
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