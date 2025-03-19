<?php
require_once "DB.php";
require_once "lib.php";
var_dump($_POST);
$action = $_POST['action'] ?? null;
if($action != null) {
    if($action == "update") {
        $result = DB::exec("UPDATE Notice SET type = ?, text = ? WHERE idx = ?", [$_POST['type'], $_POST['text'], $_POST['idx']]);
        if($result == 1) {
            alert("수정 완료");
            move("/manageNotice.php");
        } else {
            alert("수정 실패");
            move("/manageNotice.php");
        }
    }

    if($action == "insert") {
        $result = DB::exec("INSERT INTO Notice (type, text) VALUES (?, ?);", [$_POST['type'], $_POST['text']]);
        if($result == 1) {
            alert("추가 완료");
            move("/manageNotice.php");
        } else {
            alert("추가 실패");
            move("/manageNotice.php");
        }
    }
}
$action = $_GET['action'] ?? null;
if($action != null) {
    if($action == "delete") {
        $result = DB::exec("DELETE FROM Notice WHERE idx = ?", [$_GET['idx']]);
        if($result == 1) {
            alert("삭제 완료");
            move("/manageNotice.php");
        } else {
            alert("삭제 실패");
            move("/manageNotice.php");
        }
    }
}