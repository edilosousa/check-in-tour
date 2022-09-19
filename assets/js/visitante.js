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
      obj.forEach(function(visitante) {
        table +=    "<tr>"+
                        "<td>"+visitante[0]+"</td>"+
                        "<td>"+visitante[1]+"</td>"+
                        "<td>"+visitante[2]+"</td>"+
                        "<td>"+visitante[3]+"</td>"+
                        "<td>"+visitante[8]+"</td>"+
                        "<td><button class='btn btn-sm btn-info' onClick='editarVisitante("+visitante[0]+")'>Editar</td>"+
                        "<td><button class='btn btn-sm btn-danger' onClick='excluirVisitante("+visitante[0]+")' data-bs-toggle='modal' data-bs-target='#excluirVisitante'>Excluir</td>"+
                    "</tr>";
    });
      $("#dadosVisitante").html(table);
    },
  });

});
$("#table-visitante").DataTable();
function editarVisitante(id){
  window.location.href = `../visitante/editar/${id}`;
}

function excluirVisitante(id){
  $("#id-visitante").val(id);
}

$("#btn-excluir-visitante").click(function(){
  var id = $("#id-visitante").val();
  $.ajax({
    type: "POST",
    url: url,
    data: {
      funcao: "excluirVisitante",
      dados: {
        id:id,
        status: 2
      },
    },
    success: function (data) {

    }
    });
});

  
