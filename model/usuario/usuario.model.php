<?php
session_start();
class Usuario
{

    public function listarUsuarios()
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM usuarios u WHERE u.usuario_status = 1');
        $data->execute();
        while ($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }

    public function buscarUsuario($id)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM  usuarios u WHERE u.usuario_id = :id');
        $data->execute(['id' => $id]);
        while ($row = $data->fetchAll()) {
            $array = $row;
        }

        print_r(json_encode($array));
    }

    public function editarUsuario($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($dados['password'] == '' || empty($dados['password'] || $dados['password'] == null)){
            $dados2 = [
                'id' => $dados['id'],
                'nome'=>$dados['nome'],
                'login' => $dados['login'],
                'tipo' => $dados['tipo'],
                'status' => $dados['status']
            ];
            $sql = "UPDATE usuarios SET usuario_nome=:nome, usuario_login=:login, usuario_tipo=:tipo, usuario_status=:status WHERE usuario_id=:id";
        }else{
            $dados2 = [
                'id' => $dados['id'],
                'nome'=>$dados['nome'],
                'login' => $dados['login'],
                'password' => md5($dados['password']),
                'tipo' => $dados['tipo'],
                'status' => $dados['status']
            ];
            $sql = "UPDATE usuarios SET usuario_nome=:nome, usuario_login=:login, usuario_senha=:password, usuario_tipo=:tipo, usuario_status=:status WHERE usuario_id=:id";
        }
        
        $data = $conn->prepare($sql);
        $data->execute($dados2);
        $count = $data->rowCount();
        if ($count > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function excluirUsuario($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuarios SET usuario_status = :status WHERE usuario_id = :id";
        $data = $conn->prepare($sql);
        $data->execute($dados);
        $count = $data->rowCount();
        if ($count > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function cadastrarUsuario($dados)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO usuarios (usuario_nome, usuario_login, usuario_senha, usuario_status, usuario_data, usuario_tipo) VALUES (?,?,?,?,?,?)";
        $data =  $conn->prepare($sql);
        $data->execute( [ $dados['nome'], $dados['login'], md5($dados['password']), '1', date('Y-m-d H:i:s'), $dados['tipo']  ] );

        if($conn->lastInsertId() > 0 ){
            echo 'true';
        }else{
            echo 'false';
        }
       
    }
}
