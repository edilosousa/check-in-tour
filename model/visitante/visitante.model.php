<?php

class Visitante
{

    public function listarVisitantes()
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM visitantes');
        $data->execute();
        while($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }
}
