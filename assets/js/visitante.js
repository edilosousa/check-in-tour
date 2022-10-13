var url = "../controller/visitante/visitante.controller.php";

$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "listarVisitantes",
      dados: {},
    },
    success: function (data) {
      const obj = JSON.parse(data);
      var table = "";
      obj.forEach(function (visitante) {
        table +=
          "<tr>" +
          "<td>" +
          visitante[0] +
          "</td>" +
          "<td>" +
          visitante[1] +
          "</td>" +
          "<td>" +
          visitante[2] +
          "</td>" +
          "<td>" +
          visitante[3] +
          "</td>" +
          "<td>" +
          visitante[8] +
          "</td>" +
          "<td><button class='btn btn-sm btn-info' onClick='editarVisitante(" +
          visitante[0] +
          ")'>Editar</td>" +
          "<td><button class='btn btn-sm btn-danger' onClick='excluirVisitante(" +
          visitante[0] +
          ")' data-bs-toggle='modal' data-bs-target='#excluirVisitante'>Excluir</td>" +
          "</tr>";
      });
      $("#dadosVisitante").html(table);
    },
  });
  $("ul.navbar-nav > li > a").removeClass('active');
    urldashboard = '../visitante/index'
    $("ul.navbar-nav > li > a[href='"+urldashboard+"']").addClass('active');
});


$("#btn-buscar-visitante").click(function(){
  var nome = $("#inputNome").val();
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "buscarVisitanteNome",
      dados: {
        nome: nome
      },
    },
    success: function (data) {
      const obj = JSON.parse(data);
      var table = "";
      obj.forEach(function (visitante) {
        table +=
          "<tr>" +
          "<td>" +
          visitante[0] +
          "</td>" +
          "<td>" +
          visitante[1] +
          "</td>" +
          "<td>" +
          visitante[2] +
          "</td>" +
          "<td>" +
          visitante[3] +
          "</td>" +
          "<td>" +
          visitante[8] +
          "</td>" +
          "<td><button class='btn btn-sm btn-info' onClick='editarVisitante(" +
          visitante[0] +
          ")'>Editar</td>" +
          "<td><button class='btn btn-sm btn-danger' onClick='excluirVisitante(" +
          visitante[0] +
          ")' data-bs-toggle='modal' data-bs-target='#excluirVisitante'>Excluir</td>" +
          "</tr>";
      });
      $("#dadosVisitante").html(table);
    },
  });
});

// $("#table-visitante").DataTable();

function editarVisitante(id) {
  window.location.href = `../visitante/editar/${id}`;
}

function excluirVisitante(id) {
  $("#id-visitante").val(id);
}

$("#btn-excluir-visitante").click(function () {
  var id = $("#id-visitante").val();
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "excluirVisitante",
      dados: {
        id: id,
        status: 2,
      },
    },
    beforeSend: function () {
      $("#btn-excluir-visitante").prop("disabled", true);
    },
    success: function (data) {
      if (data === "true") {
        $("#excluirVisitante").modal("hide");
        $(".card-header").append(
          "<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>" +
            "Visitante excluído com sucesso!" +
            "</div>"
        );
        setTimeout(() => {
          $(".alert-div").slideUp();
          location.reload();
        }, 3000);
      } else {
        $("#excluirVisitante").modal("hide");
        $(".card-header").append(
          "<div class='alert alert-danger alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>" +
            "Falha ao excluir visitante!" +
            "</div>"
        );
        setTimeout(() => {
          $(".alert-div").slideUp();
          location.reload();
        }, 3000);
      }
    },
  });
});

$("#btn-cad-visitante").click(function(){
  var nome = $("#nomeCad").val();
  var rg = $("#rgCad").val();
  var tipo = $("#tipoCad").val();
  if( nome === '' || rg === '' || tipo === ''){
    alert('Campos obrigatórios a serem preenchidos!')
  }else{
    $.ajax({
        type: "POST",
        url: url,
        data: {
          funcao: "cadastrarVisitante",
          dados: {
            nome: nome,
            rg: rg,
            tipo: tipo,
          },
        },
        success: function (data) {
          if(data === 'true'){
            $("#novoVisitante").modal("hide");
            $(".card-header").append("<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                    "Visitante cadastrado com sucesso!"+
                                    "</div>");
            setTimeout(() => {
                $('.alert-div').slideUp();
                location.reload();
            }, 3000);                        
          }else{
            $("#novoVisitante").modal("hide");
            $(".card-header").append("<div class='alert alert-danger alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                    "Não foi possível cadastrar esse visitante"+
                                    "</div>");
            setTimeout(() => {
                $('.alert-div').slideUp();
                location.reload();
            }, 3000); 
          }
        },
    });
  }
});
