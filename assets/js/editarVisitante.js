var url = "../../controller/visitante/visitante.controller.php";
$(document).ready(function(){
    var url_atual = window.location.href;
    var retorno = url_atual.split("/");
    // alert( retorno[6] );
    $.ajax({
        type: "POST",
        url: url,
        data: {
          funcao: "buscarVisitante",
          dados: {
            id: retorno[6]
          },
        },
        success: function (data) {
          const obj = JSON.parse(data);
          $("#id").val(obj[0]['visitante_id']);
          $("#nome").val(obj[0]['visitante_nome']);
          $("#rg").val(obj[0]['visitante_rg']);
          $("#data-cad").val(obj[0]['visitante_data_entrada']);
          $("#cad-por").val(obj[0]['usuario_nome']);
          $("#tipo").val(obj[0]['tipo_visitante_id']);
          $("#status").val(obj[0]['visitante_status']);
        },
      });
      $("ul.navbar-nav > li > a").removeClass('active');
      urldashboard = '../../visitante/index'
      $("ul.navbar-nav > li > a[href='"+urldashboard+"']").addClass('active');
});

$( "#button-edit" ).click(function() {
    var id = $("#id").val();
    var nome = $("#nome").val();
    var rg = $("#rg").val();
    var tipo = $("#tipo").val();
    var status = $("#status").val();
    if( nome === '' || rg === '' || tipo === ''){
      alert('Campos obrigatórios a serem preenchidos!')
    }else{
      $.ajax({
          type: "POST",
          url: url,
          data: {
            funcao: "editarVisitante",
            dados: {
              id: id,
              nome: nome,
              rg: rg,
              tipo: tipo,
              status: status
            },
          },
          success: function (data) {
            if(data === 'true'){
              $(".card-header").append("<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                      "Visitante alterado com sucesso!"+
                                      "</div>");
              setTimeout(() => {
                  $('.alert-div').slideUp();
              }, 3000);                        
            }else{
              $(".card-header").append("<div class='alert alert-danger alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                      "Nada alterado nesse cadastro"+
                                      "</div>");
              setTimeout(() => {
                  $('.alert-div').slideUp();
              }, 3000); 
            }
          },
      });
    }
});
