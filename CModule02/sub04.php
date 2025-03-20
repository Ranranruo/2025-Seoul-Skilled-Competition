
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="app">
    <?= require_once "header.php" ?>
        <main style="padding-top: 200px;">
            <section class="inner df fc g40">
                <h1 class="t">장바구니</h1>
                <div class="df fc g40">
                    <?php
                    $data = DB::fetchAll("SELECT *, cart.idx as cart_idx FROM Cart JOIN Product ON Cart.product_idx = Product.idx AND Cart.member_idx = ?", [$member->idx]);
                    foreach ($data as $cart):
                    ?>
                    <div class="df jse ac">
                        <div class="df g20 ac">
                            <div class="bi b5" style="width: 120px; aspect-ratio: 1/1; background-image: url('<?=$cart->img?>');"></div>
                            <div class="df fc g5"><h1 class="f20"><?=$cart->name?></h1><p class="f14 cg" style="width: 300px;"><?=$cart->description?></p></div>
                        </div>
                        <div class="df ac g40"><a href="cartCtrl.php?action=minus&idx=<?=$cart->cart_idx?>" class="f24 b">-</a><p class="f24 b"><?=$cart->product_count?></p><a href="cartCtrl.php?action=plus&idx=<?=$cart->cart_idx?>" class="f24 b">+</a></div>
                        <div class="f22">\<?=number_format($cart->price);?>원</div>
                        <div class="f26 b">\<?=number_format($cart->price * $cart->product_count)?>원</div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="df fc g10 ae" style="align-self: flex-end;">
                    <?php $totalPrice = DB::fetch("SELECT SUM(product.price * cart.product_count) AS totalPrice FROM Cart JOIN Product ON Cart.product_idx = Product.idx WHERE Cart.member_idx = ?", [$member->idx])?>
                    <p class="f22 cg"><?=$totalPrice->totalPrice?> 원</p>
                    <button class="bm cw b b10" style="padding: .5em 5em;">구매하기</button>
                </div>
            </section>
        </main>
        <footer class="bs df jse cw ac f12" style="height: 150px; margin-top: 50px;">
            <a href=""><img src="./images/logo.png" alt=""></a>
            <p style="text-align: center;">
                고객센터 이용안내<br>
                - 온라인몰 고객센터 1580-8282<br>
                - 매장고객센터 1577-8254<br>
                고객센터 운영시간 [평일 09:00 - 18:00]<br><br>  
                주말 및 공휴일은 1:1문의하기를 이용해주세요.<br>
                업무가 시작되면 바로 처리해드립니다.<br>
            </p>
            <p style="text-align: center;">
                주소 : 서울특별시 용산구 한강대로 123, 40층 <br>
                (주)GIFTS:Mall | 사업자등록번호 : 809-81-01157 | 대표이사 황기영<br><br>
                개인정보처리방침 | 이용약관.법적고지 | 청소년보호방침 | 이메일무단수집거부 | 사이트맵 | 채용<br><br>
                본사 대표전화 : 02-123-4567 | GIFTS:Mall 가맹상담전화 : 02-123-4568<br>
                COPYRIGHTⓒ 2024 GIFTS:MALL KOREA INC. ALL RIGHTS RESERVED<br>
            </p>
            <div>
                <p style="text-align: center;">
                    지방은행구매안전서비스<br>
                    GIFTS:Mall은 현금 결제한 금액에 대해 지방은행과 채무지급보증 계약을체결하여 안전한 거래를 보장하고 있습니다<br>
                    서비스 가입사실 확인 >
                </p>
                <div>
                    sns
                </div>
            </div>
        </footer>
    </div>
</body>
</html>