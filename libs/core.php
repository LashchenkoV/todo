<?php

function core_getData(string $name):array {
    return include DATA_PATH.$name.".php";
}

function _core_render_view($view,$data){
    ob_start();
    extract($data);
    include "$view.php";
    return ob_get_clean();
}

function core_render_view($view,$data=[]){
    return _core_render_view(VIEWS_PATH.$view,$data);
}

function core_render_template($template,$data=[]){
    return _core_render_view(TEMPLATES_PATH.$template,$data);
}

function core_render(string $view, array $data=[], string $templates="default"):string {
    $data["content"] = core_render_view($view,$data);
    return core_render_template($templates,$data);
}

function core_loadModel(string $name):void{
  include_once MODELS_PATH."$name.php";
}

function is_empty():bool {
    foreach (func_get_args() as $arg) if(empty($arg)) return true;
    return false;
}

function getRandomId():string{
    return time().rand(0,9999999);
}

function core_navigate(){
    $routes = core_getData("routes");
    $url = trim(explode("?",$_SERVER["REQUEST_URI"])[0],"/");
    foreach ($routes as $route=>$command){
        if (trim($route,"/")==$url){
            $cmd = explode("@",$command);
            $controller_name = "controller_".$cmd[0];
            $action_name = "action_".$cmd[1];
            if(!file_exists(CONTROLLERS_PATH.$controller_name.".php")) break;
            include_once CONTROLLERS_PATH.$controller_name.".php";
            if(!function_exists($action_name)) break;
            echo call_user_func($action_name);
            return;
        }
    }
    echo core_render_view("404");
}