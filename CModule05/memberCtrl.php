<?php
session_start();
require_once "./DB.php";
require_once "./lib.php";

$action = $_POST['action'] ?? null;

if($action != null) {
    extract($_POST);
    if($action == "insert") {
        if(!$id) {msg("id를 입력해주세요"); back();}
        if(!$name) {msg("name를 입력해주세요"); back();}
        if(!$password) {msg("password를 입력해주세요"); back();}
        if(!$email) {msg("email를 입력해주세요"); back();}
        $already = DB::fetch("SELECT * FROM Member WHERE id = ?", [$id]);
        if($already) {
            msg("이미 존재하는 아이디 입니다.");
            back();
        }
        $hashedPassword = hash("sha256", $password."123");
        DB::exec("INSERT INTO Member (id, name, password, email) VALUES (?, ?, ?, ?)", [$id, $name, $hashedPassword, $email]);
        msgMove("index.php?type=", "회원가입 완료");
    }
}

$action = $_GET['action'] ?? null;


if($action != null) {
    extract($_GET);
    if($action == "logout") {
        $_SESSION['member'] = null;
        msgMove("index.php?type=", "로그아웃");
    }
    if($action == "fetch") {
        $d = DB::fetch("SELECT * FROM Member WHERE id = ?", [$id]);
        if(!$d) {
            msg("존재하지 않는 회원입니다.");
            back();
        }
        if(!(hash('sha256', $password."123") == $d->password)) {
            msg("비밃번호가 틀렸습니다");
            back();
        }
        else {
            $_SESSION['member'] = $d;
            msgMove("/index.php?type=", "로그인 성공!");
        }
    }
    // if($action == "fetchAll") {
    //     $data = DB::fetchAll("SELECT * FROM Notice");
    //     echo json_encode($data);
    // }
    // if($action == "delete") {
    //     DB::exec("DELETE FROM Notice WHERE idx = ?", [$_GET['idx']]);
    //     msgMove("삭제 완료", "manageNotice.php");
    // }
}