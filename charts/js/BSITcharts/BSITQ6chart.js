$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.115/ssutracer/charts/api/BSITdata/surveyQ6Data.php",
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
          "Managerial/Executive",
          "Professional/Advisory",
          "Rank/Clerical",
          "Self-employed"
      ],
        datasets : [
          {
            label : 'Result',
            backgroundColor: [
              'rgba(0, 51, 102, 0.70)',
              'rgba(0, 0, 102, 0.70)',
              'rgba(153, 51, 51, 0.70)',
              'rgba(102, 51, 0, 0.70)'
            ],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(0, 51, 102, 1)',
              'rgba(0, 0, 102, 1)',
              'rgba(153, 51, 51, 1)',
              'rgba(102, 51, 0, 1)'
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ITchartQuestion6");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIT Job Level Position",
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
        }
      };


      var barGraph = new Chart(ctx, {
        type: 'pie',
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
