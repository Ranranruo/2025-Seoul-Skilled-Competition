<?php
require_once "./lib.php";

extract($_GET);
if($action == "insert")  {
    DB::exec("INSERT INTO Notice (type, text) VALUES (?, ?)", [$type, $text]);
    move("manageNotice.php", "추가 성공");
}
if($action == "update") {
    DB::exec("UPDATE Notice SET type = ?, text = ? WHERE idx = ?", [$type, $text, $idx]);
    move("manageNotice.php", "수정 성공");
}
if($action == "delete") {
    DB::exec("DELETE FROM Notice WHERE idx = ?", [$idx]);
    move("manageNotice.php", "삭제 성공");
}
if($action == "fetchAll") {
    $d = DB::fetchAll("SELECT * FROM Notice");
    echo json_encode($d);
}