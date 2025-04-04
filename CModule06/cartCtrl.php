<?php
require_once "./lib.php";
extract($_GET);
if($action == "insert") {
    $a = DB::fetch("SELECT * FROM Cart WHERE memberId = ? AND productId = ?", [$memberId, $productId]);
    if($a) {
        back("이미 장바구니에 있는 상품입니다.");
        exit;
    }
    DB::exec("INSERT INTO Cart (memberId, productId, count) VALUES (?, ?, 1)", [$memberId, $productId]);
    back("추가 완료");
}
if($action == "fetchAll") {
    $d = DB::fetchAll("SELECT * FROM Cart c JOIN Member m On c.memberId = m.idx JOIN Product p ON c.productId = p.idx");
    echo json_encode($d);
}
if($action == "plus") {
    DB::exec("UPDATE Cart SET count = count + 1 WHERE idx = ?", [$idx]);
    move("cart.php");
}
if($action == "minus") {
    $d = DB::fetch("SELECT * FROM Cart WHERE idx = ?", [$idx]);
    if($d->count == 1){
        DB::exec("DELETE FROM Cart WHERE idx = ?", [$idx]);
        move("cart.php");
    }
    DB::exec("UPDATE Cart SET count = count - 1 WHERE idx = ?", [$idx]);
    move("cart.php");
}

?>