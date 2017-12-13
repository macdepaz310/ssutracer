$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/overallData/oaData5.php",
    type : "GET",
    success : function (data) {


      var count = {
        oneTo5Mos : [],
        fiveTo11Mos : [],
        oneTo2yrs : [],
        twoTo3yrs : [],
        threeTo5yrs : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "1-5mos"){
          count.oneTo5Mos.push(data[i].count)
        }
        else if (data[i].answertext == "5-11mos") {
          count.fiveTo11Mos.push(data[i].count)
        }
        else if (data[i].answertext == "1-2years") {
          count.oneTo2yrs.push(data[i].count)
        }
        else if (data[i].answertext == "2-3years") {
          count.twoTo3yrs.push(data[i].count)
        }
        else if (data[i].answertext == "3-5years"){
          count.threeTo5yrs.push(data[i].count)
        }
      }
      console.log(count);

      var ctx = $("#overallChart5");
      var data = {
        labels : [],
        datasets : [
          {
            label : ['1-5months'],
            data : [count.oneTo5Mos],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['5-11months'],
             data : [ count.fiveTo11Mos],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['1-2years'],
            data : [count.oneTo2yrs],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['2-3years'],
            data : [ count.twoTo3yrs],
            backgroundColor :  'rgba(255, 255, 26, 0.7)',
            borderColor : "rgba(255, 255, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 255, 26, 1)"

          },
          {
            label : ['3-5years'],
            data : [ count.threeTo5yrs],
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
          text: "Length of finding their first job after graduation",
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
          position: "left"
        },
        barValueSpacing: 5,
        scales: {
            ticks: {
                suggestedMin: 0,
                beginAtZero: true
            },
            gridLines: {
                offsetGridLines: false
            }

      }
      };
      var chart = new Chart( ctx,{
          type : "bar",
          data : data,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
