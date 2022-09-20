<?php

include '../../model/dashboard/dashboard.model.php';
$funcao = $_POST['funcao'];
$dashboard = new DashboardController();
$dashboard->$funcao();



class DashboardController {
    
    public function listarQuantidadeVisitaMes(){
        $listar = new Dashboard();
        $listar->listarQuantidadeVisitaMes();
    }
}

?>