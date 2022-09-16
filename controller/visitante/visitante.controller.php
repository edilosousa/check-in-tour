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

}

?>