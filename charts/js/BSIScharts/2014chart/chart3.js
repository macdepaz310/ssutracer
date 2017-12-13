$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2014/2014data3.php",
    type : "GET",
    success : function (data) {


      var count = {
        sal8kBelow : [],
        sal8to15k : [],
        sal15to25k : [],
        sal25kAbove : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "8,000 below"){
          count.sal8kBelow.push(data[i].count)
        }
        else if (data[i].answertext == "8,000-15,000") {
          count.sal8to15k.push(data[i].count)
        }
        else if (data[i].answertext == "15,000-25,000") {
          count.sal15to25k.push(data[i].count)
        }
        else if (data[i].answertext == "25,000 above") {
          count.sal25kAbove.push(data[i].count)
        }
      }
      console.log(count);

      var ctx = $("#IS2014Chart3");
      var datas = {
        labels : [],
        datasets : [
          {
            label : ['8,000 Below'],
            data : [count.sal8kBelow],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['8,000-15,000'],
             data : [ count.sal8to15k],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['15,000-25,000'],
            data : [count.sal15to25k],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['25k Above'],
            data : [ count.sal25kAbove],
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
          text: "BSIS Initial Gross Monthly Income",
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
          data : datas,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
