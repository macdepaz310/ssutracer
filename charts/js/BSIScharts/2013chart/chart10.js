$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2013/2013data10.php",
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

      var ctx = $("#IS2013Chart10");

        var datas = {
        labels: [
          "Communication skills",
          "Human Relation skills",
          "Entrepreneurial skills",
          "Information Technology skills",
          "Problem-solving skills",
          "other reason(s)"
        ],
        datasets: [{
          label: "Result",
          backgroundColor: "rgba(140, 140, 140, 0.7)",
          borderColor: "rgba(140, 140, 140, 1)",
          borderWidth: 2,
          hoverBackgroundColor: "rgba(140, 140, 140, 0.4)",
          hoverBorderColor: "rgba(140, 140, 140, 1)",
          data: [
            count.communication,
            count.human,
            count.entrepreneurial,
            count.infotech,
            count.problem,
            count.other
          ],
        }]
        };
        var options = {
        maintainAspectRatio: false,

              title: {
                display: true,
                position: "top",
                text: "BSIS competencies learned in college",
                fontSize: 20,
                fontColor: "#222"
              },

              legend: {
                display: true,
                position: "top"
              },

        scales: {
          yAxes: [{
            stacked: true,
            gridLines: {
              display: true,
              color: "rgba(255,99,132,0.2)"
            }
          }],
          xAxes: [{
            gridLines: {
              display: false
            }
          }]
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
