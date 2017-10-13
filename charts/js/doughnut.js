$(document).ready(function() {

  $.ajax({
    url : "http://localhost/charts/api/data.php",
    type : "GET",
    success : function (data) {
      console.log(data);

      var score = {
        teamA : [],
        teamB : []
      };

      var len = data.length;

      for (var i = 0; i < len; i++) {

        if (data[i].teamname == "teamA") {
          score.teamA.push(data[i].score);
        }
        else if (data[i].teamname == "teamB") {
          score.teamB.push(data[i].score);
        }
      }
      console.log(score);

      var ctx = $("#mychartCanvas");

      var data = {
        labels : ["match1", "match2", "match3", "match4", "match5"],
        datasets : [
          {
            label : "TeamA score",
            data : score.teamA,
            backgroundColor : "blue",
            borderColor : "lightblue",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },
          {
            label : "TeamB score",
            data : score.teamB,
            backgroundColor : "green",
            borderColor : "lightgreen",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          }
        ]
      };
      var options = {
        title : {
          display : true,
          position : "top",
          text : "Line Graph",
          fontSize : 18,
          fontColor : "#333"
        },
        legend : {
          display : true,
          position : "bottom",
        }
      };

      var chart = new Chart( ctx, {
        type : "line",
        data : data,
        options : options
      });
    },
    error : function (data) {
      console.log(data);
    }
  });
});
