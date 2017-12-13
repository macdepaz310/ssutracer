$(document).ready(function(){

  $.ajax({
    url : "https://www.ssutracer.xyz/charts/api/BSITdata/IT2017/2017data4.php",
    type : "GET",
    success : function (data) {


      var count = {
        walkInApplicant : [],
        responseToAdvertisement : [],
        recommendedBySomeone : [],
        familyBusiness : [],
        arrangeBytheSchoolOrJobPlacementOffer : [],
        jobFairOrPublicEmploymentServiceOffice : []
      };

      var len = data.length;

      for(var i = 0; i < len; i++){

        if (data[i].answertext == "walkInApplicant"){
          count.walkInApplicant.push(data[i].count)
        }
        else if (data[i].answertext == "responseToAdvertisement") {
          count.responseToAdvertisement.push(data[i].count)
        }
        else if (data[i].answertext == "recommendedBySomeone") {
          count.recommendedBySomeone.push(data[i].count)
        }
        else if (data[i].answertext == "familyBusiness") {
          count.familyBusiness.push(data[i].count)
        }
        else if (data[i].answertext == "arrangeBytheSchoolOrJobPlacementOffer") {
          count.arrangeBytheSchoolOrJobPlacementOffer.push(data[i].count)
        }
        else if (data[i].answertext == "jobFairOrPublicEmploymentServiceOffice") {
          count.jobFairOrPublicEmploymentServiceOffice.push(data[i].count)
        }

      }
      console.log(count);

      var ctx = $("#IT2017Chart4");
      var data = {
        labels : ["Walk In Applicant", "Response To Advertisement", "Recommended By Someone", "Family Business", "Arrange by the school or job placement offer", "Job Fair or public employement service office"],
        datasets : [
          {
            label : ['Reusult'],
            data : [count.walkInApplicant, count.responseToAdvertisement, count.recommendedBySomeone, count.familyBusiness, count.arrangeBytheSchoolOrJobPlacementOffer, count.jobFairOrPublicEmploymentServiceOffice],
            backgroundColor : [
              'rgba(26, 26, 255, 0.7)',
              'rgba(255, 26, 26, 0.7)',
              'rgba(0, 153, 51, 0.7)',
              'rgba(255, 255, 26, 0.7)',
              'rgba(140, 140, 140, 0.7)',
              'rgba(255, 92, 51, 0.7)'
            ],
            borderColor : [
              'rgba(26, 26, 255, 1)',
              'rgba(255, 26, 26, 1)',
              'rgba(0, 153, 51, 1)',
              'rgba(255, 255, 26, 1)',
              'rgba(140, 140, 140, 1)',
              'rgba(255, 92, 51, 1)'
            ],
            hoverBackgroundColor : [
              'rgba(26, 26, 255, 1)',
              'rgba(255, 26, 26, 1)',
              'rgba(0, 153, 51, 1)',
              'rgba(255, 255, 26, 1)',
              'rgba(140, 140, 140, 1)',
              'rgba(255, 92, 51, 1)'
            ],

            fill: "true"
          }
        ]
      };

        var options = {
        title: {
          display: true,
          position: "top",
          text: "How BSIT graduates land on their first job.",
          fontSize: 20,
          fontColor: "#222"
        },
        tooltips: {
          enabled: true
        },
        pieceLabel:{
          mode: 'percentage',
          fontSize: 18,
          fontColor: "#111"
        },
        responsive: true,
        legend: {
          display: true,
          position: "right",
          boxWidth: 50,
          fontSize: 20,
          fontFamily: 'sans-serif',
          responsive: true
        }
      };
      var chart = new Chart( ctx,{
          type : "pie",
          data : data,
          options : options
      });
    },
    error : function (data) {


    }

  });
});
