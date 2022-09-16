<?php
include 'config/connection.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Login {
    private $id;
    private $usuario;
    private $login;
    private $password;
   
    

    public function validaAcesso($login,$password ) {
    // logica para salvar cliente no banco
    }

    public function validaPassword(){

    }
   
   }
