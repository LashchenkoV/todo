<?php
/**
 * Главная страница админ панели
 * @return string
 */
function action_index(){
    $user_id = getCurrentUser();
    $notes = getData("SELECT * FROM `notes` WHERE `user_id`='$user_id'");
    $data = [
        "title"=>"Админ панель",
        "listNotes"=>core_render_view("note_table",['notes'=>$notes]),
    ];
    return core_render("admin",$data,"admin");
}