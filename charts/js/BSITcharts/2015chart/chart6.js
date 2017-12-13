$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSITdata/IT2015/2015data6.php",
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

      var ctx = $("#IT2015Chart6");
      var datas = {
      labels: ["rank/clerical", "professional/advisory", "managerial/executive", "self-employed"],
      datasets: [{
        label: "Result",
        backgroundColor: "rgba(26, 117, 255,0.7)",
        borderColor: "rgba(140, 140, 140,1)",
        borderWidth: 2,
        hoverBackgroundColor: "rgba(26, 117, 255,0.4)",
        hoverBorderColor: "rgba(140, 140, 140,1)",
        data: [
          count.rank,
          count.professional,
          count.managerial,
          count.selfEmployed
        ],
      }]
      };
      var options = {
      maintainAspectRatio: false,

            title: {
              display: true,
              position: "top",
              text: "BSIT Job Level Position",
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
