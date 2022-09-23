<?php

include '../../model/usuario/usuario.model.php';
$funcao = $_POST['funcao'];
$usuario = new UsuarioController();
$usuario->$funcao();



class UsuarioController {
    
    public function listarUsuarios(){
        $listar = new Usuario();
        $listar->listarUsuarios();
    }

    public function buscarUsuario(){
        $buscar = new Usuario();
        $buscar->buscarUsuario($_POST['dados']['id']);
    }

    public function editarUsuario(){
        $buscar = new Usuario();
        $buscar->editarUsuario($_POST['dados']);
    }

    public function excluirUsuario(){
        $buscar = new Usuario();
        $buscar->excluirUsuario($_POST['dados']);
    }
    
    public function cadastrarUsuario(){
        $buscar = new Usuario();
        $buscar->cadastrarUsuario($_POST['dados']);
    }
    
}

?>