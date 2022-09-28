<?php
session_start();
class Usuario
{

    public function buscarRegistros($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare("SELECT v.visitante_nome,lv.* FROM log_visitas lv 
                                INNER JOIN visitantes v 
                                on v.visitante_id = lv.log_visitante_id 
                                WHERE lv.log_data_entrada >= '".$dados['datainicio']." 00:00:00' 
                                AND lv.log_data_entrada <= '".$dados['datafim']." 23:59:59' 
                                AND v.visitante_nome LIKE '".$dados['nome']."%'
                                ");

        $data->execute();
        while ($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }
}
