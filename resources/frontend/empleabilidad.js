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
        sueldos:{
            label: '',
            backgroundColor: "#117a8b"
        }
    },
});

var Empleabilidad={
    get:function(filtro) {
        $.post("empleabilidad",filtro,
        function(response) {
            pintar(response);
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
    vm.sueldos.data= sueldos.values;
    vm.sueldos.porcentajes= sueldos.porcentajes;
    
    $('#div_chart').html('<canvas id="chart" width="800" height="450"></canvas>');
    var ctx = document.getElementById("chart").getContext('2d');

    new Chart(document.getElementById("chart"), {
        type: 'polarArea',
        data: {
          labels: [
            "Con: "+vm.sueldos.porcentajes[0]+'%',
            "Sin: "+vm.sueldos.porcentajes[1]+'%'
          ],
          datasets: [
            {
                label: "",
              //label: "Population (millions)",
              backgroundColor: ["#3e95cd", "#8e5ea2"],
              data: vm.sueldos.data
            }
          ]
        }/*,
        options: {
          title: {
            display: true,
            text: 'Personas con Empleo'
          }
        }*/
    });
};
$( "#btn_sueldos" ).click(function() {
    Empleabilidad.get(vm.filtro);
});

$(document).ready(function() {
    Carreras.get();
    Regiones.get();
});