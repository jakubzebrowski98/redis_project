<?php
    require_once "./redis_server.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $redis->set('username', $login);
    $redis->set('password', $password);
    $haslo = $redis->get('username');
    
?>