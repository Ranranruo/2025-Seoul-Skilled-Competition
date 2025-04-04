<?php
require_once "./lib.php";
extract($_GET);
$action = $action ?? null;


if($action == "fetchAll") {
    $d = DB::fetchAll("SELECT * FROM Product");
    echo json_encode($d);
}

if($action == "delete") {
    DB::exec("DELETE FROM Product WHERE idx = ?", [$idx]);
    move("manageProduct.php", "삭제 완료");
}

extract($_POST);

if($action == "insert") {
    if($sale != "0") {
        $d = DB::fetch("SELECT * FROM Product WHERE category = ? AND sale != 0", [$category]);
    }
    if($d) {
        move("manageProduct.php", "인기상품은 카테고리별 1개씩만 설정 가능합니다.");
        exit;
    } else {
        echo "사진의 크기가 너무 큽니다";
        DB::exec("INSERT INTO Product (name, description, img, price, category, sale) VALUES (?, ?, ?, ?, ?, ?)", [$name, $description, $img, $price, $category, $sale]);
        move("manageProduct.php", "추가 완료");
    }
}

if($action == "update") {
    echo $sale;
    if($sale != "0") {
        $d = DB::fetch("SELECT * FROM Product WHERE category = ? AND sale != 0", [$category]);
    }
    if($d) {
        move("manageProduct.php", "인기상품은 카테고리별 1개씩만 설정 가능합니다.");
        exit;
    } else {    
        echo "사진의 크기가 너무 큽니다";
        DB::exec("UPDATE Product SET name = ?, description = ?, img = ?, price = ?, category = ?, sale = ? WHERE idx = ?", [$name, $description, $img, $price, $category, $sale, $idx]);
        move("manageProduct.php", "수정 완료");
    }
}