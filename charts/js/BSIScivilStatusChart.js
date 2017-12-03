$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.254/charts/api/BSIScivil_statusData.php",
    method: "GET",
    success: function(data){
      console.log(data);
      var civil_status = [];
      var count = [];

      for(var i in data){
        civil_status.push("Civil Status " + data[i].civil_status);
        count.push(data[i].count);
      }
      var chartdata = {
        labels : ["Married", "Separated", "Single", "Widower"],
        datasets : [
          {
            label : 'Civil Status',
            backgroundColor: [
              'rgba(255, 0, 102, 0.70)',
              'rgba(255, 0, 0, 0.70)',
              'rgba(51, 51, 204, 0.70)',
              'rgba(13, 13, 13, 0.70)'
            ],
            borderColor:'rgba(5, 5, 20), 0.75)',
            hoverBackgroundColor: [
              'rgba(255, 0, 102, 1)',
              'rgba(217, 217, 217, 1)',
              'rgba(51, 51, 204, 1)',
              'rgba(13, 13, 13, 1)'
            ],
            hoverBorderColor:'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#BSISchartCivilStatus");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "BSIS Civil Status",
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
          position: "bottom"
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
