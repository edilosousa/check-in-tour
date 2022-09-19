<?php
    // if ($_GET) {
        $url = (isset($_GET['url'])) ? $_GET['url'] : 'view/login/index.php';
        $url = array_filter(explode('/',$url));
        // var_dump($url);
        // echo count($url);

        $file = 'view/'.$url[0].'/'.$url[1].'.php';

        
        if(is_file($file)){
            include $file;
        }else{
            include 'view/login/index.php';
        }



    //     $url = explode('/', $_GET['url']);
    //     require_once 'view/'.$url[0].'.html';
    // }else{
    //     require_once 'view/login/index.html';
    // }
