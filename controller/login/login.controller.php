<?php

include '../../model/login/login.model.php';
$funcao = $_POST['funcao'];

$validarAcesso = new LoginController();
$validarAcesso->$funcao($_POST['dados']['login'],$_POST['dados']['password']);

class LoginController {
    
    public function validarACesso($login,$password){
        $acesso = new Login();
        $acesso->validaAcesso($login,$password);
    }

}

?>