$(document).ready(function() {

  $.ajax({
    url : "http://192.168.1.254/charts/api/data1.php",
    type : "GET",
    success : function (data) {
      console.log(data);

      var count = {
        Males : [],
        Females : []
      };

      var len = data.length;

      for (var i = 0; i < len; i++) {

        if (data[i].gender == "Male") {
          count.Males.push(data[i].count);
        }
        else if (data[i].gender == "Female") {
          count.Females.push(data[i].count);
        }
      }
      console.log(count);

      var ctx = $("#mychartCanvas");

      var data = {
        labels : ["Gender"],
        datasets : [
          {
            label : "Number of Males",
            data : count.Males,
            backgroundColor : "blue",
            borderColor : "lightblue",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },
          {
            label : "Number of Females",
            data : count.Females,
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
          text : "Gender",
          fontSize : 18,
          fontColor : "#333"
        },
        legend : {
          display : true,
          position : "bottom",
        }
      };

      var chart = new Chart( ctx, {
        type : "bar",
        data : data,
        options : options
      });
    },
    error : function (data) {
      console.log(data);
    }
  });
});
