$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/overallData/oaData18.php",
    type : "GET",
    success : function (data) {


      var count = {
        communication : [],
        human : [],
        entrepreneurial : [],
        infotech : [],
        problem : [],
        other : []

      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "Communication skills"){
          count.communication.push(data[i].count)
        }
        else if (data[i].answertext == "Human Relation skills") {
          count.human.push(data[i].count)
        }
        else if (data[i].answertext == "Entrepreneurial skills") {
          count.entrepreneurial.push(data[i].count)
        }
        else if (data[i].answertext == "Information Technology skills") {
          count.infotech.push(data[i].count)
        }
        else if (data[i].answertext == "Problem-solving skills") {
          count.problem.push(data[i].count)
        }
        else if (data[i].answertext == "other reason(s)") {
          count.other.push(data[i].count)
        }

      }
      console.log(count);

      var ctx = $("#overallChart10");
      var datas = {
        labels : [],
        datasets : [
          {
            label : ['Communication skills'],
            data : [count.communication],
            backgroundColor :  'rgba(26, 26, 255, 0.7)',
            borderColor : "rgba(26, 26, 255, 0.5)",
            hoverBackgroundColor : "rgba(26, 26, 255, 1)"
          },
          {
            label : ['Human Relation skills'],
             data : [ count.human],
             backgroundColor :  'rgba(0, 153, 51, 0.7)',
             borderColor : "rgba(0, 153, 51, 0.5)",
             hoverBackgroundColor : "rgba(0, 153, 51, 1)"
          },
          {
            label : ['Entrepreneurial skills'],
            data : [count.entrepreneurial],
            backgroundColor :  'rgba(255, 26, 26, 0.7)',
            borderColor : "rgba(255, 26, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 26, 26, 1)"
          },
          {
            label : ['Information Technology skills'],
            data : [ count.infotech],
            backgroundColor :  'rgba(255, 255, 26, 0.7)',
            borderColor : "rgba(255, 255, 26, 0.5)",
            hoverBackgroundColor : "rgba(255, 255, 26, 1)"
          },
          {
            label : ['Problem-solving skills'],
            data : [ count.problem],
            backgroundColor :  'rgba(255, 92, 51, 0.7)',
            borderColor : "rgba(255, 92, 51, 0.5)",
            hoverBackgroundColor : "rgba(255, 92, 51, 1)"
          },
          {
            label : ['other reason(s)'],
            data : [ count.other],
            backgroundColor :  'rgba(140, 140, 140, 0.7) ',
            borderColor : "rgba(140, 140, 140, 0.5) ",
            hoverBackgroundColor : "rgba(140, 140, 140, 1) "
          }
        ]
      };

        var options = {

        title: {
          display: true,
          position: "top",
          text: "Competencies learned in college",
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
