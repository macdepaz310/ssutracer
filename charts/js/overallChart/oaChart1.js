$(document).ready(function(){

  $.ajax({
    url : "http://localhost/ssutracer/charts/api/overallData/oaData1.php",
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

      var ctx = $("#overallChart");
      var data = {
        labels : ["Yes", "No"],
        datasets : [
          {
            label : ['Regular'],
            data : [count.Yes, count.No],
            backgroundColor : ["blue", "red"],
            borderColor : ["lightblue", "lightred"],
            fill: "true"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Employed and Unemployed",
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
          type : "pie",
          data : data,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
