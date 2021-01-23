<?php
    session_start();

    require_once "./redis_server.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $is_login = $redis -> SISMEMBER('username',$login);
    if($password == $re_password){
        if($is_login == 0){
            $redis -> SADD('username', $login);
            $redis -> HMSET("$login:dane",'username',$login,'email',$email,'password',$password,'punkty',0);
            $redis -> HMSET("$login:surowce",'drewno',200,'kamien',200,'zelazo',200);
            $redis -> HMSET("$login:jednostki",'miecznik',10,'pikinier',10,'zwiadowca',0,'szlachcic',0);
            $redis -> HMSET("$login:budynki",'ratusz',1,'tartak',1,'kamieniolom',1,'huta',1,'mur',0,'koszary',0,'spichlerz',0);
            header('Location: login_page.php');
        }else{
            header('Location: register_page.php');
        }
    }else{
        header('Location: register_page.php');
    }
?>