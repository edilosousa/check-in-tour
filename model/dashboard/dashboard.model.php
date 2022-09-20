<?php
class Dashboard
{

    public function listarQuantidadeVisitaMes()
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT MONTH(log_data_entrada), MONTHNAME(log_data_entrada), COUNT(*) FROM log_visitas GROUP BY 1');
        $data->execute();
        while ($row = $data->fetchAll()) {
            $array = $row;
        }
        print_r(json_encode($array));
    }

    
}
// SELECT QUE SEPARA POR ID E MÊS
//$data = $conn->prepare('SELECT distinct(MONTH(log_data_entrada)) AS Current_Month, COUNT(*),log_visitante_id FROM log_visitas GROUP BY Current_Month,log_visitante_id;');