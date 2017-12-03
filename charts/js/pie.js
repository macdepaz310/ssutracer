$(document).ready(function(){
  $.ajax({
    url: "http://192.168.1.254/charts/api/data1.php",
    method: "GET",
    success: function(data){
      console.log(data);
      var gender = [];
      var count = [];

      for(var i in data){
        gender.push("Gender " + data[i].gender);
        count.push(data[i].count);
      }
      var chartdata = {
        labels : ["Females", "Males"],
        datasets : [
          {
            label : 'Gender',
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

      var ctx = $("#chartGender");
      var options = {
        title: {
          display: true,
          position: "top",
          text: "Gender",
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
