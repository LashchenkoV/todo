<?php

session_start();

function auth_register(string $login, string $pass1, string $pass2): bool{
    if($pass1!=$pass2 || strlen($pass1)<3) return false;
    $user = [
        "login" => $login,
        "password" => md5($pass1)
    ];
    insertData("users",$user);
    return true;
}

function auth_login(string $login,string $pass):bool{
    $current_user = getData("SELECT * FROM `users` WHERE `login`='$login'");

    if (count($current_user)==0) return false;
    if($current_user[0]["password"]!==md5($pass)) return false;

    $_SESSION["user_id"] = $current_user[0]["id"];
    $_SESSION["user_ip"] = md5($_SERVER["REMOTE_ADDR"]);
    $_SESSION["user_agent"] = md5($_SERVER["HTTP_USER_AGENT"]);
    return true;
}


function auth_is_auth():bool{
    $id = @$_SESSION["user_id"];
    $agent = @$_SESSION["user_agent"];
    $ip = @$_SESSION["user_ip"];
    if(is_empty($id,$agent,$ip))return false;
    if($ip!=md5($_SERVER["REMOTE_ADDR"])||$agent!=md5($_SERVER["HTTP_USER_AGENT"])) return false;
    return true;
}

function auth_logout(){
    session_destroy();
}

function getCurrentUser(){
    if(!auth_is_auth()) return NULL;
    return $_SESSION["user_id"];
}