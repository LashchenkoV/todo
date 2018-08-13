<?php

function action_more(){
    if(is_empty(@$_POST['id'])) return json_encode(["status"=>false]);
    $id = (int)$_POST['id'];
    if($id == -1) return json_encode([
        "info"=>core_render_view("note_empty")
    ]);
    $id_user = getCurrentUser();
    $info = getData("SELECT * FROM `notes` WHERE `id`='{$id}' AND `user_id`='{$id_user}'");
    return json_encode([
        "info"=>core_render_view("note_more",["note"=>$info[0]])
    ]);
}

function action_add(){
    if(is_empty(@$_POST['title'],@$_POST['description'])) return json_encode(["status"=>false]);
    $id = insertData("notes",[
        'title'=>$_POST['title'],
        'text'=>$_POST['description'],
        'user_id'=>getCurrentUser(),
        'date'=>time()
    ]);
    return json_encode([
        "note"=>core_render_view("note_table",[
            'notes'=>getData("SELECT * FROM `notes` WHERE `id`='$id'")
        ])
    ]);
}

function action_delete(){
    if(is_empty(@$_POST['id'])) return json_encode(["status"=>false]);
    deleteData("notes",(int)$_POST['id']);
    return json_encode(["status"=>true]);
}