$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2016/2016data9.php",
    type : "GET",
    success : function (data) {


      var count = {
        Yes : [],
        No : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "Yes"){
          count.Yes.push(data[i].count)
        }
        else if (data[i].answertext == "No") {
          count.No.push(data[i].count)
        }
      }
      console.log(count);

      var ctx = $("#IS2016Chart9");
      var data = {
        labels : ["Yes", "No"],
        datasets : [
          {
            label : ['Result'],
            data : [count.Yes, count.No],
            backgroundColor : [
              'rgba(0, 153, 51, 0.7)',
              'rgba(0, 153, 51, 0.7))'
            ],
            borderColor : [
              "rgba(26, 26, 255, 0.3)",
              "rgba(26, 26, 255, 0.3)"
            ],
            hoverBackgroundColor : [
              "rgba(255, 26, 26, 1)",
              "rgba(140, 140, 140, 1)"
            ],

            fill: "true"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Was the curriculum you had in college relevant to your job? ",
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
