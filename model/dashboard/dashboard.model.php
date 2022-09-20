<?php
class Dashboard
{

    public function listarQuantidadeVisitaMes()
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM visitantes v inner join tipos t on t.tipo_id = v.tipo_visitante_id WHERE v.visitante_status = 1');
        $data->execute();
        while ($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }

    
}
