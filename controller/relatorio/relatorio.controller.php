<?php

include '../../model/relatorio/relatorio.model.php';
$funcao = $_POST['funcao'];
$relatorio = new RelatorioController();
$relatorio->$funcao();



class RelatorioController {
    
    public function buscarRegistros(){
        $buscar = new Usuario();
        $buscar->buscarRegistros($_POST['dados']);
    }

    
}

?>