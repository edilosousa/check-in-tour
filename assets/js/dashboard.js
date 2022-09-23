var url = "../controller/dashboard/dashboard.controller.php";
var url2 = "../controller/visitante/visitante.controller.php";
var url3 = "../controller/log/log.controller.php";

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
    console.log(labels);
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
      beforeSend: function (){
        $("#footerBuscarVisistante").html("")
      },
      success: function (data) {
        if(data != 0){
            const obj = JSON.parse(data);
            obj.forEach(function (visitante) {
                // 
                $("#footerBuscarVisistante").html("<button class='btn btn-success' id='btn-confirm-visita' onClick='btnConfirmVisita("+visitante[0]+")'>"+visitante[1]+"</button>");
            });
        }else{
            $("#footerBuscarVisistante").html("Não há registros com esse número de identificação!");
        }
      },
    });
  }, 3000);
});

function btnConfirmVisita(id){
    $.ajax({
        type: "POST",
        url: url3,
        data: {
          funcao: "registrarVisitante",
          dados: {
            id: id
          },
        },
        beforeSend: function () {
            $("#btn-confirm-visita").prop("disabled", true)
        },
        success: function (data) {
            if(data == 'true'){
                $("#footerBuscarVisistante").append("<br><div class='alert alert-success mt-2' role='alert'>" +
                                                        "Visitante confirmado!"+
                                                        "</div>");
                setTimeout(function(){
                    window.location.href = "../dashboard/index";
                },2000)                                                        
            }else{
                
            }
        }
    });
}
