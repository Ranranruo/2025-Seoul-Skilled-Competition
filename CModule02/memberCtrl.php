<?php
require_once "DB.php";
require_once "lib.php";
session_start();
$action = $_POST['action'] ?? null;
$salt = '1234';
if($action == 'register') {
    extract($_POST);
    $hashedPassword = hash('sha256', $salt. $password);
    $success = DB::exec("INSERT INTO Member (id, password, name, email) VALUES (?, ?, ?, ?)", [$id, $hashedPassword, $name, $email]);
    $_SESSION['member'] = DB::fetch("SELECT * FROM Member WHERE id = ?", [$id]);
    alert("회원가입 성공!");
    move("/");
}
if($action == 'login') {
    extract($_POST);
    $member = DB::fetch("SELECT * FROM Member WHERE id = ?", [$id]);
    if(hash('sha256', $salt.$password) == $member->password){
        $_SESSION['member'] = $member;
        alert("로그인 성공!");
        move("/");
    }
    alert("로그인 실패!");
    move("/");

}

$action = $_GET['action'] ?? null;
if($action == 'logout') {
    $_SESSION['member'] = null;
    alert("로그아웃!");
    move("/");
}