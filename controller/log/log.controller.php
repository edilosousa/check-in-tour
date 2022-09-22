<?php

include '../../model/log/log.model.php';
$funcao = $_POST['funcao'];

$buscar = new LogController();
$buscar->$funcao($_POST['dados']['id']);

class LogController {
    
    public function registrarVisitante($id){
        $acesso = new Log();
        $acesso->registrarVisitante($id);
    }

}

?>