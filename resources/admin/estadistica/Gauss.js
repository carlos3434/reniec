var mydata1 = {
    labels : ["-3",-2,-1,"0",1,2,"3"],
    xBegin : -3,
    xEnd :  3,   
    datasets : [
        {
            strokeColor : "rgba(220,220,220,1)",
            data : [],
            xPos : [],
            title : "Sinus"
        }
    ]
};
var mydata2 = {
    labels : ["-3",-2,-1,"0",1,2,"3"],
    xBegin : -3,
    xEnd :  3,   
    datasets : [
        {
            strokeColor : "rgba(220,220,220,1)",
            data : [],
            xPos : [],
            title : "Sinus"
        }
    ]
};
var gauss_var=1;
var gauss_mean=0;

var opt1 = {
    canvasBorders : true,
    canvasBordersWidth : 3,
    canvasBordersColor : "black",
    graphTitle : "Gauss Function - (0,1)",
    legend : true,
    datasetFill : false,
    annotateDisplay : true,
    pointDot :false,
    animationLeftToRight : true,
    animationEasing: "linear",
    yAxisMinimumInterval : 0.02,
    graphTitleFontSize: 18
};
function dibujar(sueldos){
    var i;
    var nbiter=63;
    for( i=0;i<nbiter;i++)
    {
        mydata1.datasets[0].xPos[i]=mydata1.xBegin+i*(mydata1.xEnd-mydata1.xBegin)/nbiter;
        rest = mydata1.datasets[0].xPos[i]-gauss_mean;
        mydata1.datasets[0].data[i]=(1/(gauss_var*Math.sqrt(2*Math.PI))) * Math.exp(-(rest*rest)/(2*gauss_var));
    }
    var myLine = new Chart(document.getElementById("canvas_Line1").getContext("2d")).Line(mydata1,opt1);
    
    for ( i =0;i< sueldos.length; i++) {
        mydata2.datasets[0].xPos[i]=mydata2.xBegin+i*(mydata2.xEnd-mydata2.xBegin)/parseInt(sueldos[i]);
        rest = mydata2.datasets[0].xPos[i]-gauss_mean;
        mydata2.datasets[0].data[i]=(1/(gauss_var*Math.sqrt(2*Math.PI))) * Math.exp(-(rest*rest)/(2*gauss_var));
    }
    var myLine2 = new Chart(document.getElementById("canvas_Line2").getContext("2d")).Line(mydata2,opt1);
    

}
window.onload = function() {
    Sueldos.get(dibujar);
};