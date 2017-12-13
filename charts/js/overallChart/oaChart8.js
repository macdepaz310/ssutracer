$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/overallData/oaData8.php",
    type : "GET",
    success : function (data) {


      var count = {
        family : [],
        advanced : [],
        health : [],
        lackOfExp : [],
        noJobOpp : [],
        didNotLook : [],
        other : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "Family concern and decided not to find a job"){
          count.family.push(data[i].count)
        }
        else if (data[i].answertext == "Advanced or further study") {
          count.advanced.push(data[i].count)
        }
        else if (data[i].answertext == "Health-related reason") {
          count.health.push(data[i].count)
        }
        else if (data[i].answertext == "Lack of work experience") {
          count.lackOfExp.push(data[i].count)
        }
        else if (data[i].answertext == "No job opportunity") {
          count.noJobOpp.push(data[i].count)
        }
        else if (data[i].answertext == "did not look for a job") {
          count.didNotLook.push(data[i].count)
        }
        else if (data[i].answertext == "other reason(s)") {
          count.other.push(data[i].count)
        }

      }
      console.log(count);

      var ctx = $("#overallChart8");
      var datas = {
        labels : [],
        datasets : [
          {
            label : ['Family concern and decided not to find a job'],
            data : [count.family],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['Advanced or further study'],
             data : [ count.advanced],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['Health-related reason'],
            data : [count.health],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['Lack of work experience'],
            data : [ count.lackOfExp],
            backgroundColor :  'rgba(255, 255, 26, 0.7)',
            borderColor : "rgba(255, 255, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 255, 26, 1)"
          },
          {
            label : ['No job opportunity'],
            data : [ count.noJobOpp],
            backgroundColor :  'rgba(255, 92, 51, 0.7)',
            borderColor : "rgba(255, 92, 51, 0.5)",
            hoverBackgroundColor : "rgba(255, 92, 51, 1)"
          },
          {
            label : ['Did not look for a job'],
            data : [ count.didNotLook],
            backgroundColor :  'gba(140, 140, 140, 0.7) ',
            borderColor : "gba(140, 140, 140, 0.5) ",
            hoverBackgroundColor : "gba(140, 140, 140, 1) "
          },
          {
            label : ['other reason(s)'],
            data : [ count.other],
            backgroundColor :  'rgba(0, 0, 0, 0.7)',
            borderColor : "rgba(0, 0, 0, 0.5)",
            hoverBackgroundColor : "rgba(0, 0, 0, 1)"
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Reasons why graduates are not employed yet",
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
