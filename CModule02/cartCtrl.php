<?php
require_once "DB.php";
require_once "lib.php";
$action = $_GET['action'] ?? null;

if($action != null) {
    if($action == "insert") {
        $already = DB::fetch("SELECT EXISTS (SELECT 1 FROM Cart WHERE product_idx = ? AND member_idx = ?) AS already", [$_GET['productIdx'], $_GET['memberIdx']]);
        if($already->already) {
            DB::exec("UPDATE Cart SET product_count = product_count + 1 WHERE product_idx = ? AND member_idx = ?", [$_GET['productIdx'], $_GET['memberIdx']]);
            alert("장바구니 추가 완료");
            script("history.back();");
            exit;    
        }
        DB::exec("INSERT INTO Cart (product_idx, member_idx) VALUES (?, ?)", [$_GET['productIdx'], $_GET['memberIdx']]);
        alert("장바구니 추가 완료");
        script("history.back();");
    }
    if($action == "plus") {
        DB::exec("UPDATE Cart SET product_count = product_count + 1 WHERE idx = ?", [$_GET['idx']]);
        move("sub04.php");
    }
    if($action == "minus") {
        $idx = DB::fetch("SELECT product_count FROM Cart WHERE idx = ?", [$_GET['idx']]);
        if($idx->product_count == "1") {
            DB::exec("DELETE FROM Cart WHERE idx = ?", [$_GET['idx']]);
            move("sub04.php");
            exit;
        }
        DB::exec("UPDATE Cart SET product_count = product_count - 1 WHERE idx = ?", [$_GET['idx']]);
        move("sub04.php");
    }

}

