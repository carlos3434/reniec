let vm = new Vue({
    el: '#portfolio',
    data: {
        carreras:[],
        regiones:[],
        references:[2012,2017],
        filtro:{
            careerName:'',
            referenceYear:2012,
            regionName:'',
            genderName:'',
            experienceYears:5
        },
        sueldos:{},
    },
});

var Empleabilidad={
    get:function(filtro) {
        $.post("universidad",filtro,
        function(response) {
            //pintar(response);
            vm.sueldos = response;
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

var Carreras={
    get:function() {
        $.get( "careers",
        function(response) {
            vm.carreras=response.careers;
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
var Regiones={
    get:function() {
        $.get( "regiones",
        function(response) {
            vm.regiones=response.regiones;
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

pintar=function(sueldos){
    
};
$( "#btn_sueldos" ).click(function() {
    Empleabilidad.get(vm.filtro);
});

$(document).ready(function() {
    Carreras.get();
    Regiones.get();
});