<?php

class Log
{

    public function buscarVisitante($rg)
    {
        include '../../config/connection.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare('SELECT * FROM usuarios WHERE usuario_login = :login');
        $data->execute(array('login' => $login));
        $read = $data->fetchAll();
        if ($read) {
            if (md5($password) === $read[0]['usuario_senha']) {
                echo 'true';
                $_SESSION['idUsuario'] = $read[0]['usuario_id'];
            } else {
                echo "Login ou senha inválidos!";
            }
        } else {
            echo "Login ou senha inválidos!";
        }
    }
}
