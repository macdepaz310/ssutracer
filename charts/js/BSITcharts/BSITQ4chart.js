$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.115/ssutracer/charts/api/BSITdata/surveyQ4Data.php",
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
        "Arrange By the School Or Job Placement Offer", "Family Business",
        "Job Fair Or Public Employment Service Office",
        "Recommended By Someone",
        "Response To Advertisement",
        "Walk In Applicant"
        ],
        datasets : [
          {
            label : 'RESULT',
            backgroundColor: [
              'rgba(100, 0, 102, 0.70)',
              'rgba(60, 23, 10, 0.70)',
              'rgba(200, 0, 10, 0.70)',
              'rgba(32, 0, 12, 0.70)',
              'rgba(21, 0, 102, 0.70)',
              'rgba(51, 51, 204, 0.70)'
            ],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(100, 0, 102, 1)',
              'rgba(60, 23, 10, 1)',
              'rgba(200, 0, 10, 1)',
              'rgba(32, 0, 12, 1)',
              'rgba(21, 0, 102, 1)',
              'rgba(51, 51, 204, 1)'
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ITchartQuestion4");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIT on How They Land on Thier First Job",
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
