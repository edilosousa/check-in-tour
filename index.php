<?php
    if ($_GET) {
        $url = explode('/', $_GET['url']);
        require_once 'view/'.$url[0].'.html';
    }else{
        require_once 'view/login/index.html';
    }

?>