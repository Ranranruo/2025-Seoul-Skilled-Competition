<?php
require_once "DB.php";
require_once "lib.php";

$action = $_POST['action'] ?? null;


if($action != null) {
    if($action == "insert") {
        if($_POST['sale'] != "일반") {
            $already = DB::fetch("SELECT EXISTS(SELECT 1 FROM Product WHERE category = ? AND sale != '일반') as already", [$_POST['category']]);
            if($already->already) {
                alert("인기 상품은 한 카테고리에 2개 이상일 수 없습니다.");
                move("manageProduct.php");
                exit;
            }
        }
        DB::exec("INSERT INTO Product (name, description, price, sale, category, img) VALUES (?, ?, ?, ?, ?, ?)", [$_POST['name'], $_POST['description'], $_POST['price'], $_POST['sale'], $_POST['category'], $_POST['img']]);
        alert("추가 완료!");
        move("manageProduct.php");
    }
    if($action == "update") {
        if($_POST['sale'] != "일반") {
            $already = DB::fetch("SELECT EXISTS(SELECT 1 FROM Product WHERE category = ? AND sale != '일반') as already", [$_POST['category']]);
            if($already->already) {
                alert("인기 상품은 한 카테고리에 2개 이상일 수 없습니다.");
                move("manageProduct.php");
                exit;
            }
        }
        DB::exec("UPDATE Product SET name = ?, description = ?, price = ?, sale = ?, category = ?, img = ? WHERE idx = ?", [$_POST['name'], $_POST['description'], $_POST['price'], $_POST['sale'], $_POST['category'], $_POST['img'], $_POST['idx']]);
        alert("수정 완료!");
        move("manageProduct.php");
    }
}

$action = $_GET['action'] ?? null;

if($action != null) {
    if($action == "delete") {
        DB::exec("DELETE FROM Product WHERE idx = ?", [$_GET['idx']]);
        alert("삭제 완료!");
        move("manageProduct.php");
    }
    if($action == "select_all") {
        $data = DB::fetchAll("SELECT * FROM product");
        echo json_encode($data);
    }
}