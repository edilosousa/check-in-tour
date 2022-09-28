var url = "../controller/relatorio/relatorio.controller.php";

$(document).ready(function () {
  $("ul.navbar-nav > li > a").removeClass('active');
      urldashboard = '../relatorio/index'
      $("ul.navbar-nav > li > a[href='"+urldashboard+"']").addClass('active');
});

$("#btn-buscar-registro").click(function(){
    $(".div-load-busca").addClass('d-none');
    var nome = $("#nome").val();
    var datainicio = $("#data-inicio").val();
    var datafim = $("#data-fim").val();
    $.ajax({
        type: "POST",
        url: url,
        data: {
          funcao: "buscarRegistros",
          dados: {
            nome: nome,
            datainicio: datainicio,
            datafim: datafim
          },
        },
        beforeSend: function (){
            $(".div-load-busca").removeClass('d-none');
        },
        success: function (data) {
          const obj = JSON.parse(data);
          var table = " <table class='table'>"+
                        "<thead>" +
                        "   <th>ID</th>" +
                        "   <th>Nome</th>" +
                        "   <th>Dia da visita</th>" +
                        "</thead>";
          obj.forEach(function (usuario) {
           
            table +=
              "<tr>" +
              "<td><span class='badge bg-primary'>" +
              usuario[2] +
              "</span></td>" +
              "<td>" +
              usuario[0] +
              "</td>" +
              "<td>" +
              usuario[3] +
              "</td>" +
              "</tr>";
          });
          table += "</table>";
          $(".result-busca").html(table);
        },
      });
})

