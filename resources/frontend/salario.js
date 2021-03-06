let vm = new Vue({
    el: '#portfolio',
    data: {
        carreras:[],
        regiones:[],
        references:[2012,2017],
        filtro1:{
            careerName:'',
            referenceYear:2012,
            regionName:'',
            genderName:'',
            experienceYears:5
        },
        filtro2:{
            careerName:'',
            referenceYear:2017,
            regionName:'',
            genderName:'',
            experienceYears:5
        },
        sueldos1:{
            label: '',
            backgroundColor: "#117a8b"
        },
        sueldos2:{
            label: '',
            backgroundColor: "#d39e00"
        }
    },
});

var Empleabilidad={
    get:function(filtro,tipo) {
        $.post("sueldos",filtro,
        function(response) {
            pintar(response,tipo);
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

pintar=function(sueldos,tipo){
    if (tipo==1) {
        vm.sueldos1.data= sueldos.values;
    }
    if (tipo==2) {
        vm.sueldos2.data= sueldos.values;
    }
    $('#div_chart').html('<canvas id="chart" width="800" height="450"></canvas>');
    var ctx = document.getElementById("chart").getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["<1k", "1k - 3k", "3k - 5k", "5k - 8k", ">8k"],
          datasets: [
            vm.sueldos1,
            vm.sueldos2
          ]
        }
    });
};
$( "#btn_sueldos" ).click(function() {
    Empleabilidad.get(vm.filtro1,1);
});
$( "#btn_sueldos2" ).click(function() {
    Empleabilidad.get(vm.filtro2,2);
});

$(document).ready(function() {
    Carreras.get();
    Regiones.get();
});