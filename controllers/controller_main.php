<?php

function action_login(){
    return core_render("signin",["title"=>"SignIn"]);
}

function action_register(){
    return core_render("signup",["title"=>"SignUp"]);
}

function action_reg(){
    if(is_empty(@$_POST["login"],@$_POST["pass1"],@$_POST["pass2"]) || !auth_register($_POST["login"],$_POST["pass1"],$_POST["pass2"])){
       return json_encode([
           "register"=>'0',
           "error"=>"406"
       ]);
    }
    return json_encode(["register"=>'1']);
}

function action_log(){
    if(is_empty(@$_POST["login"],@$_POST["pass"]) || !auth_login($_POST["login"],$_POST["pass"])) {
        return json_encode([
            "auth" => '0',
            "error" => "403"
        ]);
    }
    return json_encode(["auth"=>'1']);
}

function action_logout(){
    auth_logout();
    header("Location:/");
}