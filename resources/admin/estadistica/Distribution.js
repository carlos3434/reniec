
(function() {

  var margin = {top: 20, right: 20, bottom: 80, left: 50},
      width = 944 - margin.left - margin.right,
      height = 480 - margin.top - margin.bottom;

  var xSteps = 20,
      xRange = d3.range(-xSteps/2, xSteps/2+1);

  var yMax = 20;

  var normalMean = 0.,
      normalStdDev = 3.;

  var numDataPoints = 100;

  var transitionDuration = 500;
  var updateDelay = 500;

  // Data

  dataPoints = d3.range(numDataPoints)
    .map(function() { 
      var a = d3.random.normal(normalMean, normalStdDev); 
      return Math.round(a());
    });

  console.log(dataPoints);

  // Draw SVG
  var svg = d3.select("#Distribution").append("svg")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.top + margin.bottom)
    .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  // X scale
  var x = d3.scale.ordinal()
      .domain(xRange)
      .rangeRoundBands([0, width], .1);

  // X axis
  var xAxis = d3.svg.axis()
      .scale(x)
      .orient("bottom");

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  // Y scale
  var y = d3.scale.linear()
      .range([height, 0])
      .domain([0, yMax]);

  // Y axis  
  var yAxis = d3.svg.axis()
      .scale(y)
      .orient("left");

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis);

  // Initial, empty histogram
  var dataHist = d3.layout.histogram()
    .bins(xRange)
    ([]);

  // Draw initial bars
  var barRects = svg.selectAll("rect")
      .data(dataHist)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("transform", function(d) { return "translate(" + x(d.x) 
            + "," + y(d.y) + ")"; }) 
      .attr("width", x.rangeBand())
      .attr("height", function(d) { return height - y(d.y); });

  // Draw walker number in top right
  var walkNumText = svg.append("text")
      .attr("id", "walk-num-text")
      .style("text-anchor", "end")
      .attr("x", width)
      .attr("y", 4);

  // Y Label
  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Count");

function updateBars(i) {

  setTimeout(function() {

    // Slice to current i-step
    var DataPointsSliced = dataPoints.slice(0, i);
  
    // Bin the data
    var dataHist = d3.layout.histogram()
      .bins(xRange) // .bins(20)
      (DataPointsSliced);

    d3.select('#walk-num-text').text(i + "/" + numDataPoints);

    // Update bars
    svg.selectAll("rect")
        .data(dataHist)
      .transition()
        .duration(transitionDuration)
        .ease("bounce")
        .attr("transform", function(d) { return "translate(" + x(d.x) 
              + "," + y(d.y) + ")"; })
        .attr("height", function(d) { return height - y(d.y); });

    i++;

    if (i <= numDataPoints) {
      updateBars(i);
    }

  }, updateDelay);

}

updateBars(0);

})()