<?php

include '../../model/log/log.model.php';
$funcao = $_POST['funcao'];

$buscar = new LogController();
$buscar->$funcao($_POST['dados']);

class LogController {
    
    public function buscarVisitante($rg){
        $acesso = new Log();
        $acesso->buscarVisitante($rg);
    }

}

?>