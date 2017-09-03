var vm = new Vue({
    el: '#portfolio',
    data: {
        carreras: [],
        carreraSelec: ''
    }
});

var Empleabilidad = {
    get: function get(careerId, callback) {
        $.get("sueldos/" + careerId, function (response) {
            callback(response);
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    }
};

var Carreras = {
    get: function get() {
        $.get("careers", function (response) {
            vm.carreras = response.careers;
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    }
};

pintar = function pintar(sueldos) {
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
    color = ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"];

    data = {
        labels: sueldos.labels,
        datasets: [{
            label: '# of Votes',
            data: sueldos.data,
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
            borderColor: ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
            borderWidth: 1
        }]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
};
$("#btn_sueldos").click(function () {
    careerId = $('#slct_carrera').val();
    Empleabilidad.get(careerId, pintar);
});
$(document).ready(function () {
    Carreras.get();
});