//Requisição de acesso ao controller login
var url = "controller/login/login.controller.php";

$("form").submit(function(e){
    e.preventDefault();
    var login = $("#login").val();
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
            funcao:"validarACesso",
            dados:{
                login: login,
                password: password
            }
        },
        success: function(data){
           
        }
      });
 });

