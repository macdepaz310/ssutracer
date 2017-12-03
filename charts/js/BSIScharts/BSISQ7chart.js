$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.115/ssutracer/charts/api/BSISdata/surveyQ7Data.php",
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
        labels : ["No", "Yes"],
        datasets : [
          {
            label : 'Result',
            backgroundColor: [
              'rgba(92, 92, 61, 0.70)',
              'rgba(115, 38, 38, 0.70)'
            ],
            borderColor:'rgba(0, 51, 51, 0.5)',
            hoverBackgroundColor: [
              'rgba(92, 92, 61, 1)',
              'rgba(115, 38, 38, 1)'
            ],
            hoverBorderColor: 'rgba(0, 51, 51, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ISchartQuestion7");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIT ",
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
        type: 'doughnut',
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
