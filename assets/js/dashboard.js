var url = "../controller/dashboard/dashboard.controller.php";

$(document).ready(function () {
  var card = "";
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "listarQuantidadeVisitaMes",
      dados: {},
    },
    success: function (data) {
      var obj = JSON.parse(data);
      gerarGrafico(obj);
      obj.forEach(function (visitante) {
        card +=
          "<div class='col-sm-3'>" +
          "<div class='card'>" +
          "<div class='card-header'>" +
          visitante[1] +
          "</div>" +
          "<div class='card-body'>" +
          visitante[2] +
          "</div>" +
          "</div>" +
          "</div>";
      });
      $("#mesVisita").html(card);
    },
  });

  function gerarGrafico(obj) {
    var labels = [];
    for (var i = 0; i < obj.length; i++) {
      labels += '"'+obj[i][1] + ",";
      // console.log(obj[i][1])
    }
    console.log(labels);
    const data = {
      labels: labels,
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: "rgb(255, 99, 132)",
          borderColor: "rgb(255, 99, 132)",
          data: [0, 10, 5, 2, 20, 30, 45],
        },
      ],
    };

    const config = {
      type: "line",
      data: data,
      options: {},
    };

    const myChart = new Chart(document.getElementById("myChart"), config);
  }

  //   const label = ["January", "February", "March", "April", "May", "June"];

  //   const data = {
  //     labels: labels,
  //     datasets: [
  //       {
  //         label: "My First dataset",
  //         backgroundColor: "rgb(255, 99, 132)",
  //         borderColor: "rgb(255, 99, 132)",
  //         data: [0, 10, 5, 2, 20, 30, 45],
  //       },
  //     ],
  //   };

  //   const config = {
  //     type: "line",
  //     data: data,
  //     options: {},
  //   };

  //   const myChart = new Chart(document.getElementById("myChart"), config);
});
