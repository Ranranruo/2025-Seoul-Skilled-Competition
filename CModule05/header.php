<?php
session_start();
$type = $_GET['type'] ?? null;
$member = $_SESSION['member'] ?? null;
function isLogined() { return isset($member);}
?>

<header class="bx1 pf w tl z1 bw1"><div class="inner df fc jsb" style="height: 80px;">
    <?php if($member == null):?>
                <div style="height: 20px;" class="f12 df ac je g10"><a href="?type=login">로그인</a><a href="?type=sign-up">회원가입</a></div>
    <?php else:?>
        <div style="height: 20px;" class="f12 df ac je g10"><a href=""><?=$member->name?></a><a href="memberCtrl.php?action=logout">로그아웃</a></div>
    <?php endif; ?>
                <div style="height: 60px;" class="df jsb ac">
                    <a href="./index.php" class="t cm df g5 ac f30"><i class="fa fa-dropbox"></i>GIFTS:Mall</a>
                    <div class="menu df g20 18 b">
                        <a href="intro.php">소개</a>
                        <div class="pr">
                            <a href="./allProduct.php">판매상품</a>
                            <div class="bw1 drop f16 df fc jc ac pa b5 bx2 g5" style="top: 60px; width: 100px; left: -22px;">
                                <a href="./allProduct.php">전체상품</a><a href="./bestProduct.php">인기상품</a>
                            </div>
                        </div>
                        <a href="">가맹점</a>
                    </div>
                    <div class="util 18 b df g20">
                        <a href="./cart.php">장바구니</a>
                        <?php if($member != null && $member->id == "admin"):  ?>
                            <div class="pr menu">
                                <a href="./manageNotice.php">관리자</a>
                                <div class="bw1 drop f16 df fc jc ac pa b5 bx2 g5" style="top: 60px; width: 100px; left: -22px;">
                                    <a href="./manageNotice.php">공지사항관리</a><a href="./manageProduct.php">판매상품관리</a>
                                </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
        </div></header>
        <?php if(isset($type) && $type == "login"):?>
            <form action="memberCtrl.php" class="df jc ac pf tl z100" style="width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, .8)" method="get">
            <div class="df fc g50 bx bw1 b10 ac" style="padding: 20px 60px;">
                <input type="text" name="action" value="fetch" hidden>
                <h1>Login</h1> 
                <ul class="df fc g20">
                    <li class="df fc g5"><p class="b">id</p><input type="text" class="bx2 bw2 btn1 f16" placeholder="input here" name="id"></li>
                    <li class="df fc g5"><p class="b">password</p><input type="password" class="bx2 bw2 btn1 f16" placeholder="input here" name="password"></li>
                </ul>
                <div class="w df g10 jsb"><a href="?type=" class="df jc w btn1 bw3 cb b5 bx2 f14 b hd">Cancel</a><button class="w btn1 bm cw1 b5 bx2 f14 b hd">Login</button></div>
            </div>
        </form>
        <?php endif; ?>
        <?php if(isset($type) && $type == "sign-up"):?>
            <form action="memberCtrl.php" class="df jc ac pf tl z100" style="width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, .8)" method="post">
            <div class="df fc g50 bx bw1 b10 ac" style="padding: 20px 60px;">
                <h1>Sign Up</h1> 
                <ul class="df fc g20">
                    <input type="text" name="action" value="insert" hidden>
                    <li class="df fc g5"><p class="b">id</p><input type="text" class="bx2 bw2 btn1 f16" placeholder="input here" name="id"></li>
                    <li class="df fc g5"><p class="b">name</p><input type="text" class="bx2 bw2 btn1 f16" placeholder="input here" name="name"></li>
                    <li class="df fc g5"><p class="b">password</p><input type="password" class="bx2 bw2 btn1 f16" placeholder="input here" name="password"></li>
                    <li class="df fc g5"><p class="b">email</p><input type="email" class="bx2 bw2 btn1 f16" placeholder="input here" name="email"></li>
                </ul>
                <div class="w df g10 jsb"><a href="?type=" class="df jc w btn1 bw3 cb b5 bx2 f14 b hd">Cancel</a><button class="w btn1 bm cw1 b5 bx2 f14 b hd">Sign Up</button></div>
            </div>
        </form>
        <?php endif; ?>