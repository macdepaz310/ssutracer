$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2015/2015data7.php",
    type : "GET",
    success : function (data) {


      var count = {
        Yes : [],
        No : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "yes"){
          count.Yes.push(data[i].count)
        }
        else if (data[i].answertext == "no") {
          count.No.push(data[i].count)
        }
      }
      console.log(count);

      var ctx = $("#IS2015Chart7");
      var data = {
        labels : ["Yes", "No"],
        datasets : [
          {
            label : ['Result'],
            data : [count.Yes, count.No],
            backgroundColor : [
              'rgba(140, 140, 140, 0.7)',
              'rgba(255, 92, 51, 0.7)'
            ],
            borderColor : [
              'rgba(140, 140, 140, 0.5)',
              'rgba(255, 92, 51, 0.5)'
            ],
            hoverBackgroundColor : [
              'rgba(140, 140, 140, 1)',
              'rgba(255, 92, 51, 1)'
            ],

            fill: "true"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "BSIS work related with their taken",
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
          position: "top",
          fontSize: 15
        }
      };
      var chart = new Chart( ctx,{
          type : "doughnut",
          data : data,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
