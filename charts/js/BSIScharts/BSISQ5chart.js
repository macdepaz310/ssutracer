$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.115/ssutracer/charts/api/BSISdata/surveyQ5Data.php",
    method: "GET",
    success: function(data){
      console.log(data);
      var answertext = [];
      var count = [];

      for(var i in data){
        answertext.push("Answer " + data[i].answertext);
        count.push(data[i].count);
      }
      var chartdata = {
        labels : [
          "1-2 Years",
          "1-5 Months",
          "2-3 Years",
          "3-5 Years",
          "5-11 Months"
        ],
        datasets : [
          {
            label : 'Result',
            backgroundColor: [
              'rgba(51, 204, 204, 0.70)',
              'rgba(102, 153, 0, 0.70)',
              'rgba(255, 0, 102, 0.70)',
              'rgba(204, 51, 255, 0.70)',
              'rgba(255, 51, 51, 0.70)'
            ],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(51, 204, 204, 1)',
              'rgba(102, 153, 0, 1)',
              'rgba(255, 0, 102, 1)',
              'rgba(204, 51, 255, 1)',
              'rgba(255, 51, 51, 1)'
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ISchartQuestion5");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIS First Job After Graduated",
          fontSize: 20,
          fontColor: "#222"
        },
        tooltips: {
          enabled: true
        },
        pieceLabel:{
          mode: 'percentage',
          fontSize: 18,
          fontColor: "#111"
        },
        responsive: true,
        legend: {
          display: true,
          position: "top"
        },
        scales: {
        xAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,
                beginAtZero: true,
            }
        }]
        }
      };


      var barGraph = new Chart(ctx, {
        type: 'horizontalBar',
        data: chartdata,
        showDatapoints: true,
        options : options
      })
    },
    error: function(data) {
      console.log(data);
    }
  });
});
