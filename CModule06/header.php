<?php
require_once "./lib.php";
session_start();
$member = $_SESSION['member'] ?? null;
$type = $_GET['type'] ?? null;
?>

<!-- 헤더 영역 -->
 <input type="" id="memberId" value="<?=isset($member) ? $member->idx : null?>" hidden>
 <header class="bx1 pf tl w bw1 z1"><div class="inner df fc jc" style="height: 80px;">
    <?php if(!isset($member)): ?>
        <div class="df je g10" style="padding: 5px 0px;"><a href="?type=login">로그인</a><a href="?type=sign-up">회원가입</a></div>
    <?php else: ?>
        <div class="df je g10" style="padding: 5px 0px;"><a><?=$member->name?></a><a href="./memberCtrl.php?action=logout">로그아웃</a></div>
    <?php endif;?>
        <div class="df jsb ac">
            <a href="./index.php" class="cm b t f30" style="font-weight: 400;"><i class="fa fa-dropbox"></i>GIFT:Mall</a>
            <div class="menu df g30 b f18">
            <a href="./intro.php">소개</a>
                <div class="pr">
                    <a href="./allProduct.php">판매상품</a>
                    <div class="drop oh b10 bw1 df g5 fc jc ac pa bx2" style="width: 100px; top: 60px; right: -20px;">
                        <a href="./allProduct.php">전체상품</a>
                        <a href="./bestProduct.php">인기상품</a>
                    </div>
                </div>
                <a href="#">가맹점</a>
            </div>
            <div class="menu df g30 b f18">
                <a href="./cart.php">장바구니</a>
                <?php if(isset($member) && $member->id == "admin"):?>
                <div class="pr">
                    <a href="">관리자</a>
                    <div class="drop oh b10 bw1 df g5 fc jc ac pa bx2" style="width: 120px; top: 65px; right: -20px;">
                        <a href="manageNotice.php">공지사항관리</a>
                        <a href="manageProduct.php">판매상품관리</a>
                    </div>
                </div>
                <a href="userInfo.php">회원관리</a>
                <?php endif; ?>
            </div>
        </div>
    </div></header>
    <?php if(isset($type) && $type == "sign-up"): ?>
    <form action="./memberCtrl.php" class="pf w h z100 tl df jc ac" style="background-color: rgba(0, 0, 0, .8)" action="">
        <input type="text" name="action" value="sign-up" hidden>
        <div class="b10 bx2 bw1" style="padding: 20px;">
            <h1>회원가입</h1>
            <div class="df fc g30">
                <div class="df fc g10">
                    <div class="df fc g5"><p>id</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="text" name="id"></div>
                    <div class="df fc g5"><p>name</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="text" name="name"></div>
                    <div class="df fc g5"><p>email</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="email" name="email"></div>
                    <div class="df fc g5"><p>password</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="password" name="password"></div>
                </div>
                <div class="df jsb"><a class="btn1 hd bw3 cb" href="?">취소하기</a><button class="btn1 hd bm cw1 f16 b5">회원가입</button></div>
            </div>
        </div>
    </form>
    <?php endif; ?>
    <?php if(isset($type) && $type == "login"): ?>
    <form action="./memberCtrl.php" class="pf w h z100 tl df jc ac" style="background-color: rgba(0, 0, 0, .8)" action="">
        <input type="text" name="action" value="login" hidden>
        <div class="b10 bx2 bw1" style="padding: 20px;">
            <h1>로그인</h1>
            <div class="df fc g30">
                <div class="df fc g10">
                    <div class="df fc g5"><p>id</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="text" name="id"></div>
                    <div class="df fc g5"><p>password</p><input class="bx2 btn1 f16 b5" placeholder="input here" type="password" name="password"></div>
                </div>
                <div class="df jsb"><a class="btn1 hd bw3 cb" href="?">취소하기</a><button class="btn1 hd bm cw1 f16 b5">로그인</button></div>
            </div>
        </div>
    </form>
    <?php endif; ?>