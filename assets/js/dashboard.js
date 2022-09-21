var url = "../controller/dashboard/dashboard.controller.php";
var url2 = "../controller/visitante/visitante.controller.php";

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
      //   $("#mesVisita").html(card);
    },
  });

  function gerarGrafico(obj) {
    var labels = [];
    var datas = [];
    for (var i = 0; i < obj.length; i++) {
      labels.push(obj[i][1]);
      datas.push(obj[i][2]);
    }
    console.log(datas);
    const data = {
      labels: labels,
      datasets: [
        {
          label: "Quantidade de visitantes por mês",
          backgroundColor: "rgb(0, 0, 255)",
          borderColor: "rgb(70,130,180)",
          data: datas,
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

var temporiza;
$("#buscarVisitante").on("input", function () {
  $("#footerBuscarVisistante").html("Buscando...");
  var buscarVisitante = $("#buscarVisitante").val();
  clearTimeout(temporiza);
  temporiza = setTimeout(function () {
    $("#footerBuscarVisistante").html("");
    $.ajax({
      type: "POST",
      url: url2,
      data: {
        funcao: "buscarVisitanteVisita",
        dados: {
            rg: buscarVisitante
        },
      },
      success: function (data) {
        if(data != 0){
            const obj = JSON.parse(data);
            obj.forEach(function (visitante) {
        
                $("#footerBuscarVisistante").html(visitante[1]);
            });
        }
      },
    });
  }, 3000);
});
