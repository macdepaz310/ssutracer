$(document).ready(function(){

  $.ajax({
    url : "http://localhost/ssutracer/charts/api/overallData/oaData2.php",
    type : "GET",
    success : function (data) {


      var count = {
        SelfEmployed : [],
        Regular : [],
        Casual : [],
        Temporary : [],
        Contractual : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "Regular"){
          count.Regular.push(data[i].count)
        }
        else if (data[i].answertext == "Self-Employed") {
          count.SelfEmployed.push(data[i].count)
        }
        else if (data[i].answertext == "Temporary") {
          count.Temporary.push(data[i].count)
        }
        else if (data[i].answertext == "Casual") {
          count.Casual.push(data[i].count)
        }
        else if (data[i].answertext == "Contractual") {
          count.Contractual.push(data[i].count)
        }
      }
      console.log(count);

      var ctx = $("#overallChart2");
      var data = {
        labels : [],
        datasets : [
          {
            label : ['Regular'],
            data : [count.Regular],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['Casual'],
             data : [ count.Casual],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['Temporary'],
            data : [count.Temporary],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['Contractual'],
            data : [ count.Contractual],
            backgroundColor :  'rgba(255, 255, 26, 0.7)',
            borderColor : "rgba(255, 255, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 255, 26, 1)"

          },
          {
            label : ['SelfEmployed'],
            data : [count.SelfEmployed],
            backgroundColor :  'rgba(140, 140, 140, 0.7)',
            borderColor : "rgba(140, 140, 140, 0.5)",
            hoverBackgroundColor : "rgba(140, 140, 140, 1)"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Job Status",
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
          position: "top"
        },
        barValueSpacing: 5,

        scales: {
          xAxes: [{
            display: true,
            barThickness : 50,
            ticks: {
                suggestedMin: 0,
                beginAtZero: true
            },
            gridLines: {
                offsetGridLines: false
            }
        }]
      }
      };
      var chart = new Chart( ctx,{
          type : "horizontalBar",
          data : data,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
