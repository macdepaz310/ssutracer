$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.254/ssutracer/charts/api/BSISdata/surveyQ3Data.php",
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
        labels : ["15,000-25,000", "8,000-15,000", "8,000 below", "25,000 above"],
        datasets : [
          {
            label : 'Result',
            backgroundColor: [
              'rgba(100, 0, 102, 0.70)',
              'rgba(200, 0, 10, 0.70)',
              'rgba(32, 0, 12, 0.70)',
              'rgba(21, 0, 102, 0.70)',
              'rgba(51, 51, 204, 0.70)'],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(100, 0, 102, 1)',
              'rgba(200, 0, 102, 1)',
              'rgba(32, 0, 102, 1)',
              'rgba(21, 0, 102, 1)',
              'rgba(51, 51, 204, 1)',
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ISchartQuestion3");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIS Initial Monthly Growth Income",
          fontSize: 20,
          fontColor: "#222"
        },
        tooltips: {
          enabled: true
        },
        pieceLabel:{
          mode: 'value',
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
                beginAtZero: true
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
