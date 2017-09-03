let vm = new Vue({
    el: '#portfolio',
    data: {
        carreras:[],
        regiones:[],
        carreraSelec:'',
        regionSelec:'',
        genero:'',
        anio:2017
    },
});

var Empleabilidad={
    get:function(careerId,anio,callback) {
        $.get( "sueldos/"+careerId+"/"+anio,
        function(response) {
            callback(response);
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
    //console.log(sueldos);
    var ctx = document.getElementById("myChart").getContext('2d');
    //sueldos.data
    //sueldos.labels

    options = {
        scales: {
            xAxes: [{
                gridLines: {
                    offsetGridLines: true
                }
            }]
        }
    };
    color =[
        "rgb(255, 99, 132)",
        "rgb(255, 159, 64)",
        "rgb(255, 205, 86)",
        "rgb(75, 192, 192)",
        "rgb(54, 162, 235)",
        "rgb(153, 102, 255)",
        "rgb(201, 203, 207)"
    ];

    data ={
        labels: sueldos.labels,
        datasets: [{
            label: '# of Votes',
            data: sueldos.data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };


    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
};
$( "#btn_sueldos" ).click(function() {
    careerId=$('#slct_carrera').val();
    anio=vm.anio;
    genero=vm.genero;
    Empleabilidad.get(careerId,anio,pintar);
    
});



options ={
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 2,
        percentageInnerCutout : 50,
        animationSteps : 100,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        //animateScale: true
};
var data = {
    labels: [
        "Saudi Arabia",
        "Russia",
    ],
    datasets: [
        {
            data: [133.3, 86.2],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]
};
var chartOptions = {
  rotation: -Math.PI,
  cutoutPercentage: 30,
  circumference: 2*Math.PI,
  legend: {
    position: 'left'
  },
  animation: {
    animateRotate: false,
    animateScale: true
  }
};
/*
data = {
    datasets: [{
        data: [10, 20, 30]
    }],
    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Red',
        'Yellow',
        'Blue'
    ]
};*/
var doughnut = document.getElementById("doughnut").getContext('2d');
var myPieChart = new Chart(doughnut,{
    type: 'pie',
    data: data,
    options: chartOptions
});

$(document).ready(function() {
    Carreras.get();
    Regiones.get();
});