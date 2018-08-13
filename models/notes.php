<?php

function getAllNote(){
    return getData("SELECT * FROM `notes`");
}
function insertNote($name){
    insertData("notes",["name"=>$name]);
}
function deleteNote($id){
    deleteData("notes",(int)$id);
}