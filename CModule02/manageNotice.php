

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./font-awesome.css">
</head>
<body>
    <div id="app">
    <?= require_once "header.php" ?>
        <main style="padding-top: 100px;">
            <section class="inner df fc g40">
                <h1 class="t">공지사항 관리[관리자]</h1>
                <div>
                <form action="noticeCtrl.php" method="post" class="notice w df jsb bw desc" style="height: 60px; padding: 10px; border-bottom: 2px solid #bbb;">
                                    <input required type="text" hidden value="insert" name="action">
                                    <select class="bx b5" style="border: none" name="type"><option value="이벤트">이벤트</option><option  value="일반">일반</option></select>
                                    <input required class="bx b5" placeholder="공지사항 추가" name="text" style="width: 1000px;" value=""><div>날짜(자동삽입)</div>
                                    <div class="df g10"><a class="b5 bm cw b" style="opacity: 0; padding: .5em 1em;">삭제</a><button class="b5 bm cw b" style="padding: .5em 1em;">추가</button></div>
                                </form>
                <?php $notices = DB::fetchAll("SELECT * FROM Notice ORDER BY date DESC") ?>
                            <form action=""></form>
                            <?php foreach ($notices as $key => $notice) : ?>
                                <form action="noticeCtrl.php" method="post" class="notice w df jsb bw desc" style="height: 60px; padding: 10px; border-bottom: 2px solid #bbb;">
                                    <input required type="text" hidden value="update" name="action">
                                    <input required type="text" hidden value="<?=$notice->idx?>" name="idx">
                                    <select class="bx b5" style="border: none" name="type"><option value="이벤트">이벤트</option><option <?=$notice->type == "일반" ? "selected" : ''?> value="일반">일반</option></select>
                                    <input required class="bx b5" name="text" style="width: 1000px;" value="<?=$notice->text?>"><div><?=$notice->date?></div>
                                    <div class="df g10"><button class="b5 bg b" style="padding: .5em 1em;">수정</button><a href="noticeCtrl.php?action=delete&idx=<?=$notice->idx?>" class="b5 bm cw b" style="padding: .5em 1em;">삭제</a></div>
                                </form>
                                <?php endforeach; ?>
                </div>
            </section>
        </main>
        <footer class="bs df jse cw ac f12" style="height: 150px;">
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
    <script src="./script/sub01.js"></script>
</body>
</html>

<?php 
    if($member == null) move("/");
    if($member->id != "admin") move("/");
?>