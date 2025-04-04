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
        <section class=""><div class="inner df fc g50" style="margin-top: 80px;">
            <h1 class="t df jc">Manage Member</h1>
            <div class="df fc g10">
                <!-- <div class="df je g30">
                    <div class="df g10">
                        <button data-type="" class="bw1 cb bx2 b5 btn1 b f16">전체</button>
                        <button data-type="일반" class="bw1 cb bx2 b5 btn1 b f16">일반</button>
                        <button data-type="이벤트" class="bw1 cb bx2 b5 btn1 b f16">이벤트</button>
                    </div>
                    <div class="df g10">
                        <button data-type="1" class="bw1 cb bx2 b5 btn1 b f16">Desc</button>
                        <button data-type="-1" class="bw1 cb bx2 b5 btn1 b f16">Asc</button>
                    </div>
                </div> -->
                <div class="bw1 bx2">
                    <ul class="df fc">
                        <?php $d = DB::fetchAll("SELECT * FROM Member")?>
                        <?php foreach($d as $key => $value):?>
                        <form action="noticeCtrl.php" class="df bx2 cp bw1 jsb ac" style="height: 50px; padding: 10px;">
                            <div class="df ac g20">
                                <p class="btn1 b10 f12 bs cm df jc"><?=$value->idx?></p>
                                <input type="text" class="f16" style="width: 500px;" name="text" value="<?=$value->password?>">
                            </div>
                            <div class="df g20 ac">
                                <p class="cg b"><?=$value->date?></p>
                                <div class="df g5">
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </ul>
                    <!-- <div class="df jc g20 ac f20 b cg" style="padding: 40px;"><button class="bw1 f24">&lt;</button><p class="noticePage">1/6</p><button class="bw1 f24">&gt;</button></div> -->
                </div>
            </div>
        </div></section>
    </main>
    <!-- 푸터 영역 -->
    <footer class="bw3" style="padding: 50px 0;"><div class="inner df fc g30">
            <a href="#" class="cm b t f30" style="font-weight: 400;"><i class="fa fa-dropbox"></i>GIFT:Mall</a>
            <div class="df fc g30">
                <ul class="df jsb fw">
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
    <!-- <div id="loading" class="g20 df jc ac z100 pf tl w h" style="background-color: rgba(119, 102, 255, .98)">
        <div class="bw1 b100" style="width: 40px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 40px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 40px; aspect-ratio: 1/1;"></div>
        <div class="bw1 b100" style="width: 40px; aspect-ratio: 1/1;"></div>
    </div> -->
</body>
</html>