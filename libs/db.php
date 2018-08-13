<?php

function getConnection(){
    static $connection = null;
    if ($connection !== null) return $connection;
    $name = "todo_db";
    $user = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $charset = "utf8";
    $dsn = "mysql:dbname={$name};host={$host};charset={$charset}";
    $connection = new PDO($dsn, $user, $pass, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]);
    return $connection;
}

function getData($query){
    $conn = getConnection();
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}
function insertData($table,$data){
    $fields = array_keys($data);
    $values = array_values($data);
    $conn = getConnection();
    $values = array_map(function ($elem) use ($conn){
        return is_string($elem) ? $conn->quote($elem) : $elem;
    },$values);
    $query = "INSERT INTO `{$table}` (`"
        .implode("`,`",$fields)."`) VALUES ("
        .implode(",",$values).")";
    $conn->exec($query);
    return $conn->lastInsertId();
}
function deleteData($table,$id){
    $q = "DELETE FROM `{$table}` WHERE `id`={$id}";
    getConnection()->exec($q);
}