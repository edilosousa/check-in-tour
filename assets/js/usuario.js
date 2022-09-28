var url = "../controller/usuario/usuario.controller.php";

$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "listarUsuarios",
      dados: {},
    },
    success: function (data) {
      const obj = JSON.parse(data);
      var table = "";
      obj.forEach(function (usuario) {
        if(usuario[6] == '1'){
          var tipoUsuario = 'Administrador'
        }else{
          var tipoUsuario = 'Recepecionista'
        }
        table +=
          "<tr>" +
          "<td>" +
          usuario[0] +
          "</td>" +
          "<td>" +
          usuario[1] +
          "</td>" +
          "<td>" +
          usuario[2] +
          "</td>" +
          "<td>" +
          tipoUsuario +
          "</td>" +
          "<td><button class='btn btn-sm btn-info' onClick='editarUsuario(" +
          usuario[0] +
          ")'>Editar</td>" +
          "<td><button class='btn btn-sm btn-danger' onClick='excluirUsuario(" +
          usuario[0] +
          ")' data-bs-toggle='modal' data-bs-target='#excluirUsuario'>Excluir</td>" +
          "</tr>";
      });
      $("#dadosUsuario").html(table);
    },
  });
    $("ul.navbar-nav > li > a").removeClass('active');
    urldashboard = '../usuario/index'
    $("ul.navbar-nav > li > a[href='"+urldashboard+"']").addClass('active');
  
});

// $("#table-visitante").DataTable();

function editarUsuario(id) {
  window.location.href = `../usuario/editar/${id}`;
}

function excluirUsuario(id) {
  $("#id-usuario").val(id);
}

$("#btn-excluir-usuario").click(function () {
  var id = $("#id-usuario").val();
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "excluirUsuario",
      dados: {
        id: id,
        status: 2,
      },
    },
    beforeSend: function () {
      $("#btn-excluir-usuario").prop("disabled", true);
    },
    success: function (data) {
      if (data === "true") {
        $("#excluirUsuario").modal("hide");
        $(".card-header").append(
          "<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>" +
            "Usuário excluído com sucesso!" +
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
            "Falha ao usuario visitante!" +
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

$("#btn-cad-usuario").click(function(){
  var nome = $("#nomeCad").val();
  var login = $("#loginCad").val();
  var tipo = $("#tipoCad").val();
  var password = $("#passwordCad").val();
  $.ajax({
      type: "POST",
      url: url,
      data: {
        funcao: "cadastrarUsuario",
        dados: {
          nome: nome,
          login: login,
          tipo: tipo,
          password: password
        },
      },
      success: function (data) {
        if(data === 'true'){
          $("#novoUsuario").modal("hide");
          $(".card-header").append("<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                  "Usuario cadastrado com sucesso!"+
                                  "</div>");
          setTimeout(() => {
              $('.alert-div').slideUp();
              location.reload();
          }, 3000);                        
        }else{
          $("#novoUsuario").modal("hide");
          $(".card-header").append("<div class='alert alert-danger alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                  "Não foi possível cadastrar esse usuário"+
                                  "</div>");
          setTimeout(() => {
              $('.alert-div').slideUp();
              location.reload();
          }, 3000); 
        }
      },
    });
});
