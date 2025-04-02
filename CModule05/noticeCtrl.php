<?php
require_once "./DB.php";
require_once "./lib.php";

$action = $_POST['action'] ?? null;

if($action != null) {
    extract($_POST);
    if($action == "insert") {
        DB::exec("INSERT INTO Notice (type, text) VALUES (?, ?)", [$type, $text]);
        msgMove("manageNotice.php", "추가 완료");
    }
    if($action == "update") {
        DB::exec("UPDATE Notice SET type = ?, text = ? WHERE idx = ?", [$type, $text, $idx]);
        msgMove( "manageNotice.php", "수정 완료");
    }
}

$action = $_GET['action'] ?? null;


if($action != null) {
    if($action == "fetchAll") {
        $data = DB::fetchAll("SELECT * FROM Notice");
        echo json_encode($data);
    }
    if($action == "delete") {
        DB::exec("DELETE FROM Notice WHERE idx = ?", [$_GET['idx']]);
        msgMove( "manageNotice.php", "삭제 완료");
    }
}