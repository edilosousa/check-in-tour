<?php

class Log
{

    public function registrarVisitante($id)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO log_visitas (log_visitante_id, log_data_entrada) VALUES (?,?)";
        $data =  $conn->prepare($sql);
        $data->execute( [ $id, date('Y-m-d H:i:s')  ] );

        if($conn->lastInsertId() > 0 ){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}
