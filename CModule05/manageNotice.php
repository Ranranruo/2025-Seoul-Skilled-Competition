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
    <!-- 앱 -->
    <div id="app">
        <!-- 헤더 -->
        <?php require_once "./header.php"; ?>
        <!-- 메인 -->
        <main style="margin-top: 80px;">
            <section><div class="inner df fc g50">
                <h1 class="t">Manage Notice</h1>
                <div class="df fc b5 bx2">
                <form action="noticeCtrl.php" method="post" class="cp df ac jsb btn1 bw1 bx2 cp" style="height: 50px;">
                            <!-- <input type="text" hidden name="idx" value="idx"> -->
                            <input type="text" hidden name="action" value="insert">
                            <div class="df g20 ac">
                                <select class="b20 cm bs f12 btn1 df jc ac" name="type">
                                    <option value="일반">일반</option>
                                    <option value="이벤트">이벤트</option>
                                </select>
                                <input type="text" class="f16" style="width: 600px;" placeholder="input here" name="text">
                            </div>
                            <div class="df g30 ac">
                                <p class="cg b">'Date' automatically insert</p>
                                <div class="df g5"><button class="bm cw1 btn1 hd b5 b f14">Insert</button></div>
                            </div>
                        </form>
                    <ul id="noticeList" class="df fc bw1 b10">
                        
                    </ul>
                    <!-- <div class="bw1 df jc ac f20 b cg g20" style="padding: 30px 0;"><p id="left"><</p><p id="count">1/6</p><p id="right">></p></div> -->
                </div>
            </div></section>
        </main>
            <footer class="bw3" style="padding: 50px 0;"><div class="inner">
                <ul class="df jsb">
                    <li class="df fc g30">
                        <h1 class="f22">고객센터 이용안내</h1>
                        <div class="df fc g10 b f14">
                            <p class=" df g5"><i class="fa fa-phone cm" style="font-size: 18px;"></i>- 온라인몰 고객센터 1580-8282</p>
                            <p class=" df g5"><i class="fa fa-home cm" style="font-size: 18px;"></i>- 매장고객센터 1577-8254</p>
                            <p class="">고객센터 운영시간 [평일 09:00 - 18:00]</p>
                            <p>주말 및 공휴일은 1:1문의하기를 이용해주세요.<br>업무가 시작되면 바로 처리해드립니다.</p>
                        </div>
                    </li>
                    <li class="df fc g30">
                        <h1 class="f22">바로가기</h1>
                        <div class="df fc g10 b f14">
                            <a href="#">개인정보처리방침</a>
                            <a href="#">이용약관.법적고지</a>
                            <a href="#">청소년보호방침</a>
                            <a href="#">이메일무단수집거부</a>
                            <a href="#">사이트맵</a>
                            <a href="#">채용</a>
                        </div>
                    </li>
                    <li class="df fc g30">
                        <h1 class="f22">정보</h1>
                        <div class="df fc g10 b f14">
                            <p>(주)GIFTS:Mall</p>
                            <p>사업자등록번호 : 809-81-01157</p>
                            <p>대표이사 황기영</p>
                            <p>주소 : 서울특별시 용산구 한강대로 123, 40층</p>
                            <p>본사 대표전화 : 02-123-4567</p>
                            <p>GIFTS:Mall 가맹상담전화 : 02-123-4568</p>
                        </div>
                    </li>
                    <li class="df fc g30">
                        <h1 class="f22">지방은행구매안전서비스</h1>
                        <div class="df fc g10 b f14">
                            <p style="line-height: 25px;">GIFTS:Mall은 현금 결제한 금액에<br>대해 지방은행과 채무지급보증 계약을<br> 체결하여 안전한 거래를 보장하고 있습니다</p>
                            <a href="#" class="cm f20">서비스 가입사실 확인 ></a>
                        </div>
                    </li>
                </ul>
                <div class="sns df jc ac g20" style="padding: 50px 0;">
                    <i style="font-size: 30px; color: blue;" class="fa fa-facebook-square"></i>
                    <i style="font-size: 30px; color: orange;" class="fa fa-git-square"></i>
                    <i style="font-size: 30px; color: red;" class="fa fa-pinterest-square"></i>
                    <i style="font-size: 30px; color: orange;" class="fa fa-reddit-square"></i>
                    <i style="font-size: 30px; color: blue;" class="fa fa-linkedin-square"></i>
                </div>
                <div class="df b jc ac" style="border-top: 1px solid rgba(0, 0, 0, .1); padding-top: 50px;">COPYRIGHTⓒ 2024 GIFTS:MALL KOREA INC. ALL RIGHTS RESERVED</div>
            </div></footer>
    </div>
    <!-- <div id="loading" class="g20 df jc ac w h pf tl bm z100" style="width: 100vw; height: 100vh;">
        <div class="bw1 b100" style="width: 30px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 30px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 30px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 30px; aspect-ratio: 1/1;"></div>
    </div> -->
    <script src="./script/manageNotice.js"></script>
</body>
</html>