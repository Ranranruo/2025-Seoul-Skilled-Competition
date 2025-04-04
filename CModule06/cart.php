<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./fontawesome/css/font-awesome.min.css">
</head>
<body>
    <!-- 헤더 영역 -->
    <?php require_once "./header.php" ?>
    <?php if(!isset($member)) {
        move("index.php", "장바구니 페이지는 회원만 접근 가능합니다.");
    }
     ?>
    <!-- 메인 영역 -->
    <main>
        <section style="margin-top: 80px;"><div class="inner as df jsb g40">
           <div class="w df fc g40">
                <div class="bx2 btn2 bw1 b f22 b10">장바구니</div>
                <ul class="df fc g20">
                    <?php $d = DB::fetchAll("SELECT cart.idx as cartIdx, cart.count, product.* FROM cart, product WHERE cart.productId = product.idx AND cart.memberId = ?", [$member->idx]);?> 
                    <?php $total = 0;?>
                    <?php foreach($d as $a): ?>
                    <li class="bx2 bw1 b10 df jsb ac" style="height: 200px; padding: 20px;">
                        <div class="df w h g20">
                            <div class="b10 bi h" style="aspect-ratio: 1/1; background-image: url('<?=$a->img?>');"></div>
                            <div class="text df fc jc g5">
                                <h1 class="b f20"><?=$a->name?></h1>
                                <p class="s w b cg" style="width: 400px;">국내 판매 1위 멀티비타민 이뮨 14일분에 이중제형 + 남/녀 맞춤설계 포뮬러를 적용한 신제품</p>
                                <?php 
                                $price = $a->price;
                                if($a->sale != 0) {
                                    $price = $a->sale == 10000 ? $a->price - 10000 : round($a->price - ($a->price * $a->sale));
                                }
                                ?>
                                <div class="price df g5 b cm" style="opacity: .7;"><div class="origin"><?=number_format($a->price)?></div><?=$a->sale != 0 ? "<div class='sale'>".number_format($price)."</div>" : ''?></div>
                                <p class="totalPrice b cm">총 가격: \<?=number_format($price * $a->count)?></p>
                                <?php $total = $total + $price * $a->count;?>
                            </div>
                        </div>
                        <div>
                            <div class="df bx2"><a class="b f20 bx2 jc ac df b5" style="width: 35px; aspect-ratio: 1/1;" href="cartCtrl.php?action=minus&idx=<?=$a->cartIdx?>">-</a><a class="b f20 bx2 jc ac df b5" style="width: 35px; aspect-ratio: 1/1;"><?=$a->count?></a><a class="b f20 bx2 jc ac df b5" style="width: 35px; aspect-ratio: 1/1;" href="cartCtrl.php?action=plus&idx=<?=$a->cartIdx?>">+</a></div>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
           </div>
           <div class="bx2 bw1 b10 btn2 f22 df fc g50" style="width: 500px;">
                <p class="b f22">결제</p>
                <div class="f16 df fc g15">
                    <div class="df jsb b totalPrice"><p>총 금액</p><p>\<?=number_format($total)?></p></div>
                    <div class="df g10" style="margin-bottom: 20px;"><input class="bx2 b5 btn1 f16" type="text" placeholder="쿠폰 코드"><button class="hd btn1 b5 b f16 bm cw1" style="width: 65px;">적용</button></div>
                    <div style="border-top: 1px solid rgba(0, 0, 0, .1);">
                        <div class="df fc g5" style="padding-top: 20px;">
                            <div class="df jsb b cg"><p>쿠폰 적용전 금액</p><p>\<?=number_format($total)?></p></div>
                            <p class="b f30" style="align-self: end;">\<?=number_format($total)?></p>
                            <button class="btn1 bm b f16 b5 cw1 hd">구매하기</button>
                        </div>
                    </div>
                </div>
           </div>
        </div></section>
    </main>
    <!-- 푸터 영역 -->
    <footer class="bw3" style="padding: 50px 0;"><div class="inner df fc g30">
            <a href="#" class="cm b t f30" style="font-weight: 400;"><i class="fa fa-dropbox"></i>GIFT:Mall</a>
            <div class="df fc g30">
                <ul class="df jsb">
                    <li class="df fc g20">
                        <p class="b f20">고객센터 이용안내</p>
                        <div class="df fc g5">
                            <div class="df ac g5"><i class="fa fa-phone cm"></i><p class="b">- 온라인몰 고객센터 1580-8282</p></div>
                            <div class="df ac g5"><i class="fa fa-home cm"></i><p class="b">- 매장고객센터 1577-8254</p></div>
                            <p class="f14">고객센터 운영시간 [평일 09:00 - 18:00]</p>
                            <p class="f14">주말 및 공휴일은 1:1문의하기를 이용해주세요.<br>업무가 시작되면 바로 처리해드립니다.</p>
                        </div>
                    </li> 
                    <li class="df fc g20">
                        <p class="b f20">바로가기</p>
                        <div class="df fc g5">
                            <a class="f16">개인정보처리방침</a>
                            <a class="f16">이용약관.법적고지</a>
                            <a class="f16">청소년보호방침</a>
                            <a class="f16">이메일무단수집거부</a>
                            <a class="f16">사이트맵</a>
                            <a class="f16">채용</a>
                        </div>
                    </li>
                    <li class="df fc g20">
                        <p class="b f20">정보</p>
                        <div class="df fc g5">
                            <p class="f14">(주)GIFTS:Mall</p>
                            <p class="f14">사업자등록번호 : 809-81-01157</p>
                            <p class="f14">대표이사 황기영</p>
                            <p class="f14">주소 : 서울특별시 용산구 한강대로 123, 40층 </p>
                            <p class="f14">본사 대표전화 : 02-123-4567</p>
                            <p class="f14">GIFTS:Mall 가맹상담전화 : 02-123-4568</p>
                        </div>
                    </li>
                    <li class="df fc g20">
                        <p class="b f20">지방은행구매안전서비스</p>
                        <div class="df fc g15">
                            <p style="line-height: 25px;">GIFTS:Mall은 현금 결제한 금액에 대해<br>지방은행과 채무지급보증 계약을체결하여<br>안전한 거래를 보장하고 있습니다</p>
                            <a href="#" class="cm b f18">서비스 가입사실 확인 ></a>
                        </div>
                    </li> 
                </ul>
                <div class="sns df jc g10">
                    <i class="cp fa fa-reddit-square" style="font-size: 30px; color: orange;"></i>
                    <i class="cp fa fa-facebook-square" style="font-size: 30px; color: blue;"></i>
                    <i class="cp fa fa-pinterest-square" style="font-size: 30px; color: red;"></i>
                    <i class="cp fa fa-git-square" style="font-size: 30px; color: orange;"></i>
                    <i class="cp fa fa-twitter-square" style="font-size: 30px; color: skyblue;"></i>
                </div>
                <div class="df jc b" style="border-top: 1px solid gray; padding-top: 50px;">COPYRIGHTⓒ 2024 GIFTS:MALL KOREA INC. ALL RIGHTS RESERVED</div>
            </div>
    </div></footer>
</body>
</html>