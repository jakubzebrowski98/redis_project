<?php
    session_start();

    require_once "./redis_server.php";
    $login = $_POST['login'];
    $password = $_POST['password'];
    $aut_password = $redis -> HGET("$login:dane", 'password');
    if($aut_password == $password){
        $_SESSION['login'] = $login;
        header('Location: home.php');
    }else{
        header('Location: login_page.php');
    }
    
?>