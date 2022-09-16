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
                        "<td>"+visitante[4]+"</td>"+
                        "<td><button class='btn btn-sm btn-info'>Editar</td>"+
                        "<td><button class='btn btn-sm btn-danger'>Excluir</td>"+
                    "</tr>";
        console.log(visitante[1]);
    });
      $("#dadosVisitante").html(table);
      //   alert(data)
    },
  });
});
