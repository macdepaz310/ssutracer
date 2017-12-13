$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2015/2015data8.php",
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

      var ctx = $("#IS2015Chart8");

      var datas = {
      labels: [
        "Family concern",
        "Advanced or further study",
        "Health-related reason",
        "Lack of work experience",
        "No job opportunity",
        "Did not look for a job",
        "other reason(s)"
      ],
      datasets: [{
        label: "Result",
        backgroundColor: "rgba(26, 117, 255,0.7)",
        borderColor: "rgba(140, 140, 140,1)",
        borderWidth: 2,
        hoverBackgroundColor: "rgba(26, 117, 255,0.4)",
        hoverBorderColor: "rgba(140, 140, 140,1)",
        data: [
          count.family,
          count.advanced,
          count.health,
          count.lackOfExp,
          count.noJobOpp,
          count.didNotLook,
          count.other
        ],
      }]
      };
      var options = {
      maintainAspectRatio: false,

            title: {
              display: true,
              position: "top",
              text: "Reason why BSIS Graduates are haven't got a Job",
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
