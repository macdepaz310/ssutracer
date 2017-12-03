$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.115/ssutracer/charts/api/BSISdata/surveyQ1Data.php",
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
            label : 'Question 1',
            backgroundColor: [
              'rgba(255, 0, 102, 0.70)',
              'rgba(51, 51, 204, 0.70)'],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(255, 0, 102, 1)',
              'rgba(51, 51, 204, 1)',
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#ISchartQuestion1");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "Are You Currently Employed?",
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
        // maintainAspectRatio: false,
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
