<?php


$login = $_POST['dados']['login'];
$password = $_POST['dados']['password'];
$funcao = $_POST['funcao'];

$validarAcesso = new LoginController();
$validarAcesso->$funcao($login,$password);

class LoginController {
    
    public function validarACesso($login,$password){
        echo $login;
    }

    public function validarACesso2($login,$password){
        echo $password;
    }

}

?>