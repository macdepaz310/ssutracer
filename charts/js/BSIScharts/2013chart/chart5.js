$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSISdata/IS2013/2013data5.php",
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

      var ctx = $("#IS2013Chart5");
      var datas = {
      labels: ["1-5months", "5-11months", "1-2years", "2-3years", "3-5years"],
      datasets: [{
        label: "Result",
        backgroundColor: [
          "rgba(26, 26, 255, 0.7)",
          "rgba(0, 153, 51, 0.7)",
          "rgba(255, 26, 26, 0.7)",
          "rgba(255, 255, 26, 0.7)",
          "rgba(140, 140, 140, 0.7)"
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
        data: [
          count.oneTo5Mos,
          count.fiveTo11Mos,
          count.oneTo2yrs,
          count.twoTo3yrs, count.threeTo5yrs
        ],
      }]
      };
      var options = {
      maintainAspectRatio: false,

      title: {
        display: true,
        position: "top",
        text: "Length of BSIS finding their jobs",
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
