<?php
require_once "DB.php";
session_start();
$member = $_SESSION['member'] ?? null;
?>
<?php $type = $_GET['type'] ?? '' ?>
<header class="pf w z100" style="height: 100px; background-color: rgba(0, 0, 0, .4); backdrop-filter: blur(2px);">
            <div class="inner df jsb w h fw">
                <a href="./index.php"><img src="./images/logo.png" alt=""></a>
                <div class="df as g20" style="margin-top: 37px;">
                    <a class="cw hcm" href="./sub01.php">소개</a>
                    <div id="aaa" class="cw hcm">
                        <a style="height: 100px;" href="#">판매상품</a>
                        <div id="aab" class="df oh fc w h">
                            <a class="df jc ac" style="height: 50px;" href="./sub02.php">전체상품</a>
                            <a class="df jc ac" style="height: 50px;" href="./sub03.php">인기상품</a>
                        </div>
                    </div>
                    <a class="cw hcm" href="./sub01.php">가맹점</a>
                    <a class="cw hcm" href="./sub04.php">장바구니</a>
                </div>
                <div class="df fc cw g15">
                    <?= $member == null ? '<div class="df f14 g10 je"><a href="?type=login">로그인</a><a href="?type=register">회원가입</a></div>' : 
                    '<div class="df f14 g10 je"><p href="?type=login">'. $member->name. '</p><a href="memberCtrl.php?action=logout">로그아웃</a></div>'
                    ?>
                    <div class="df f20 g20"><a href="#">장바구니</a><div class="df fc oh ac" id="caa"><a href="#">관리자</a><a href="sub05.php">공지사항관리</a><a href="">b</a></div></div>
                </div>
            </div>
</header>

<?php if($type == "register"): ?>
<div class="w h pf df jc as" style="top:0; left: 0; z-index: 99999900000000009; background-color: rgba(0, 0, 0, .8)">
    <form class="bw df fc ac b10 g20 p50" action="memberCtrl.php" method="post" style="margin-top: 20px;">
        <input required type="text" name="action" value="register" hidden>
        <h1 class="f30">회원가입</h1>
        <div class="df fc g20">
            <div class="df fc g5"><p>id</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="text" name="id"></div>
            <div class="df fc g5"><p>password</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="password" name="password"></div>
            <div class="df fc g5"><p>email</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="email" name="email"></div>
            <div class="df fc g5"><p>name</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="text" name="name"></div>
        </div>
        <div class="df g20"><a class="bg cw b5 hd cp" style="padding: .5em 1em" href="?">돌아가기</a><button class="bm cw b5 hd cp" style="padding: .5em 1em">회원가입</button></div>
    </form>
</div>
<?php endif; ?>
<?php if($type == "login"): ?>
<div class="w h pf df jc as" style="top:0; left: 0; z-index: 99999900000000009; background-color: rgba(0, 0, 0, .8)">
    <form class="bw df fc ac b10 g20 p50" action="memberCtrl.php" method="post" style="margin-top: 20px;">
        <input required type="text" name="action" value="login" hidden>
        <h1 class="f30">로그인</h1>
        <div class="df fc g20">
            <div class="df fc g5"><p>id</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="text" name="id"></div>
            <div class="df fc g5"><p>password</p><input required class="b5" style="background-color: #efefef; padding: .5em 1em" type="password" name="password"></div>
        </div>
        <div class="df g20"><a class="bg cw b5 hd cp" style="padding: .5em 1em" href="?">돌아가기</a><button class="bm cw b5 hd cp" style="padding: .5em 1em">로그인</button></div>
    </form>
</div>
<?php endif; ?>

