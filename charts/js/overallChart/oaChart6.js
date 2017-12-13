$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/overallData/oaData6.php",
    type : "GET",
    success : function (data) {


      var count = {
        rank : [],
        professional : [],
        managerial : [],
        selfEmployed : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "rank/clerical"){
          count.rank.push(data[i].count)
        }
        else if (data[i].answertext == "professional/advisory") {
          count.professional.push(data[i].count)
        }
        else if (data[i].answertext == "managerial/executive") {
          count.managerial.push(data[i].count)
        }
        else if (data[i].answertext == "self-employed") {
          count.selfEmployed.push(data[i].count)
        }

      }
      console.log(count);

      var ctx = $("#overallChart6");
      var datas = {
        labels : [],
        datasets : [
          {
            label : ['Rank/Clerical'],
            data : [count.rank],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['Professional/Advisory'],
             data : [ count.professional],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['Managerial/Executive'],
            data : [count.managerial],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['Self-Employed'],
            data : [ count.selfEmployed],
            backgroundColor :  'rgba(255, 255, 26, 0.7)',
            borderColor : "rgba(255, 255, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 255, 26, 1)"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Job Positions",
          fontSize: 20,
          fontColor: "#222"
        },
        tooltips: {
          enabled: true
        },
        pieceLabel:{
          mode: 'value',
          fontSize: 18,
          fontColor: "#111"
        },
        responsive: true,
        legend: {
          display: true,
          position: "right"
        },
        barValueSpacing: 5,
        scales: {
          yAxes: [{
            ticks: {
              suggestedMin: 0,
                beginAtZero: true
            }
        }],

            gridLines: {
                offsetGridLines: false
            }

      }
      };
      var chart = new Chart( ctx,{
          type : "bar",
          data : datas,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
