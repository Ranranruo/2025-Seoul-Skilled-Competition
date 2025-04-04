<?php
session_start();
require_once "./lib.php";
extract($_GET);
if($action == "sign-up"){
    if(!$id) back("id를 입력해주세요");
    if(!$password) back("password를 입력해주세요");
    if(!$email) back("email를 입력해주세요");
    if(!$name) back("name를 입력해주세요");
    $hash = hash("sha256", $password."123");

    DB::exec("INSERT INTO Member (id, password, email, name) VALUES (?, ?, ?, ?)", [$id, $hash, $email, $name]);
    move("index.php?type=", "회원가입 성공");
}
if($action == "login" ) {
    $d = DB::fetch("SELECT * FROM Member WHERE id = ?", [$id]);
    if(!$d) back("id가 잘못되었습니다.");
    if($d->password == hash("sha256", $password."123")) {
        $_SESSION['member'] = $d;
        move("index.php?type=", "로그인 성공");
    }
}
if($action == "logout") {
    $_SESSION['member'] = null;
    move("index.php?type=", "로그아웃");
}