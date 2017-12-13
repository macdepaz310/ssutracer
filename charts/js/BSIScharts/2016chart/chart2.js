$(document).ready(function(){

  $.ajax({

    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2016/2016data2.php",
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

      var ctx = $("#IS2016Chart2");
      var datas = {
      labels: ["Regular", "Casual", "Temporary", "Contractual", "Self-Employed"],
      datasets: [{
        label: "Result",
        backgroundColor: [
          "rgba(26, 26, 255, 0.7)",
          "rgba(0, 153, 51, 0.7)",
          "rgba(255, 26, 26, 0.7)",
          "rgba(255, 255, 26, 0.7)",
          "rgba(140, 140, 140, 0.7)",
        ],
        borderColor: [
          "rgba(26, 26, 255, 0.5)",
          "rgba(0, 153, 51, 0.5)",
          "rgba(255, 26, 26, 0.5)",
          "rgba(255, 255, 26, 0.5)",
          "rgba(140, 140, 140, 0.5)"
        ],
        borderWidth: 2,
        hoverBackgroundColor: "rgba(26, 117, 255,0.4)",
        hoverBorderColor: "rgba(140, 140, 140,1)",
        data: [count.Regular, count.Casual, count.Temporary, count.Contractual, count.SelfEmployed],
      }]
      };
      var options = {
      maintainAspectRatio: false,

      title: {
        display: true,
        position: "top",
        text: "BSIS Graduates Job Status",
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
          type : "horizontalBar",
          data : datas,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
