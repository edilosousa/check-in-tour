<?php
session_start();
class Visitante
{

    public function listarVisitantes()
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

    public function buscarVisitante($id)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM  visitantes v inner join usuarios u ON u.usuario_id = v.usuario_id WHERE v.visitante_id = :id');
        $data->execute(['id' => $id]);
        while ($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }

    public function editarVisitante($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE visitantes SET visitante_nome=:nome, visitante_rg=:rg, tipo_visitante_id=:tipo, visitante_status=:status WHERE visitante_id=:id";
        $data = $conn->prepare($sql);
        $data->execute($dados);
        $count = $data->rowCount();
        if ($count > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function excluirVisitante($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE visitantes SET visitante_status = :status WHERE visitante_id = :id";
        $data = $conn->prepare($sql);
        $data->execute($dados);
        $count = $data->rowCount();
        if ($count > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function cadastrarVisitante($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO visitantes (visitante_nome, visitante_rg, visitante_data_entrada, tipo_visitante_id, usuario_id) VALUES (?,?,?,?,?)";
        $data =  $conn->prepare($sql);
        $data->execute( [$dados['nome'], $dados['rg'], date('Y-m-d H:i:s'), $dados['tipo'], $_SESSION['idUsuario']  ] );

        if($conn->lastInsertId() > 0 ){
            echo 'true';
        }else{
            echo 'false';
        }
       
    }
}
