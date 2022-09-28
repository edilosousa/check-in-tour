var url = "../../controller/usuario/usuario.controller.php";
$(document).ready(function(){
    var url_atual = window.location.href;
    var retorno = url_atual.split("/");
    // alert( retorno[6] );
    $.ajax({
        type: "POST",
        url: url,
        data: {
          funcao: "buscarUsuario",
          dados: {
            id: retorno[6]
          },
        },
        success: function (data) {
          const obj = JSON.parse(data);
          $("#id").val(obj[0]['usuario_id']);
          $("#nome").val(obj[0]['usuario_nome']);
          $("#login").val(obj[0]['usuario_login']);
          $("#data-cad").val(obj[0]['usuario_data']);
          $("#tipo").val(obj[0]['usuario_tipo']);
          $("#status").val(obj[0]['usuario_status']);
        },
      });
  
      $("ul.navbar-nav > li > a").removeClass('active');
      urldashboard = '../../usuario/index'
      $("ul.navbar-nav > li > a[href='"+urldashboard+"']").addClass('active');
});

$( "#button-edit" ).click(function() {
    var id = $("#id").val();
    var nome = $("#nome").val();
    var login = $("#login").val();
    var password = $("#password").val();
    var tipo = $("#tipo").val();
    var status = $("#status").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
          funcao: "editarUsuario",
          dados: {
            id: id,
            nome: nome,
            login: login,
            password: password,
            tipo: tipo,
            status: status
          },
        },
        success: function (data) {
          if(data === 'true'){
            $(".card-header").append("<div class='alert alert-success alert-div' style=' padding-top:0px; padding-bottom:0px; margin-top:-42px; margin-left:70%; width:30%; ' role='alert'>"+
                                    "Usuário alterado com sucesso!"+
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
});
