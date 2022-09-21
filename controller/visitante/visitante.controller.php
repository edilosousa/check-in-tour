<?php

include '../../model/visitante/visitante.model.php';
$funcao = $_POST['funcao'];
$visitante = new VisitanteController();
$visitante->$funcao();



class VisitanteController {
    
    public function listarVisitantes(){
        $listar = new Visitante();
        $listar->listarVisitantes();
    }

    public function buscarVisitante(){
        $buscar = new Visitante();
        $buscar->buscarVisitante($_POST['dados']['id']);
    }

    public function editarVisitante(){
        $buscar = new Visitante();
        $buscar->editarVisitante($_POST['dados']);
    }

    public function excluirVisitante(){
        $buscar = new Visitante();
        $buscar->excluirVisitante($_POST['dados']);
    }
    
    public function cadastrarVisitante(){
        $buscar = new Visitante();
        $buscar->cadastrarVisitante($_POST['dados']);
    }

    public function buscarVisitanteVisita(){
        $buscar = new Visitante();
        $buscar->buscarVisitanteVisita($_POST['dados']['rg']);
    }

    
}

?>