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
    <!-- 메인 영역 -->
    <main>
        <section style="margin-top: 80px;"><div class="inner df fc g50">
            <h1 class="t">Manage Product</h1>
            <div class="df w jsb as g40">
                <div class="w df fc g40">
                    <form id="addProduct" method="post" action="productCtrl.php" class="bx2 bw1 b10 df jsb ac" style="height: 200px; padding: 20px;">
                        <div class="df w h g20">
                            <input type="text" name="action" value="insert" hidden>
                            <input type="text" name="img" hidden value="">
                            <input type="file" id="fakeImg" class="fakeImg" hidden accept="image/*">
                            <label class="b10 bi h df jc ac f20 b cw1" style="aspect-ratio: 1/1; background-color: rgba(0, 0, 0, .2)" for="fakeImg"></label>
                            <div class="text df fc jc g5">
                                <input class="b f20 bx2 b5 btn1" placeholder="name" name="name" />
                                <input class="s w b b5 bx2 btn1" style="width: 400px;" placeholder="description" name="description"/>
                                <input class="cm btn1 b5 bx2" type="number" placeholder="price" name="price">
                                <select class="btn1 b5 bx2" id="" name="category">
                                    <option value="건강식품">건강식품</option>
                                    <option value="디지털">디지털</option>
                                    <option value="팬시">팬시</option>
                                    <option value="향수">향수</option>
                                    <option value="헤어케어">헤어케어</option>
                                </select>
                                <select class="btn1 b5 bx2" name="sale" id="" placeholder="sale" name="sale">
                                    <option disabled>sale</option>
                                    <option value="0">기본</option>
                                    <option value="10000">만원할인</option>
                                    <option value="0.1">10%할인</option>
                                    <option value="0.3">30%할인</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn1 bm cw1 b5 hd b f20" value="a" style="width: 100px;">추가</button>
                        </div>
                    </form>
                    <ul class="df fc g30" id="productList">
                        
                    </ul>
                </div>
                <div class="bx2 bw1 b10 btn2 f22 df fc g50" style="width: 500px;">
                    <p class="b f22">order</p>
                    <div class="f16 df fc g15 orderBtns">
                        <button class="btn1 b5 bs cm f16 b hd" data-order="1">Desc</button>
                        <button class="btn1 b5 bs cm f16 b hd" data-order="-1">Asc</button>
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
    <script src="./script/manageProduct.js"></script>
</body>
</html>