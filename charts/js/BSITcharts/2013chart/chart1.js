$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSITdata/IT2013/2013data1.php",
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

      var ctx = $("#IT2013Chart1");
      var data = {
        labels : ["Yes", "No"],
        datasets : [
          {
            label : ['Result'],
            data : [count.Yes, count.No],
            backgroundColor : ['rgba(26, 26, 255, 0.7)',  'rgba(255, 26, 26, 0.7)'],
            borderColor : ["rgba(26, 26, 255, 1)", "rgba(255, 26, 26, 1)"],
            hoverBackgroundColor : ["rgba(26, 26, 255, 1)", "rgba(255, 26, 26, 1)"],

            fill: "true"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "BSIT Graduates Employed and Unemployed",
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
