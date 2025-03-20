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
            <section id="ad" class="inner p50 df fc g40">
                <h1 class="t cb">광고</h1>
                <div class="df jc pr">
                    <video class="b10" width="100%" src="./bimages/AD.mp4"></video>
                    <div class="pa w active control df fc ae" style="top: 0; right: 0;">
                        <button data-event="play" class="cp">①재생</button>
                        <button data-event="pause" class="cp">②일시정지</button>
                        <button data-event="stop" class="cp">③정지</button>
                        <button data-event="back" class="cp">④되감기(10초씩)</button>
                        <button data-event="go" class="cp">⑤빨리감기(10초씩)</button>
                        <button data-event="slow" class="cp">⑥감속하기(0.1배씩)</button>
                        <button data-event="fast" class="cp">⑦배속하기(0.1배씩)</button>
                        <button data-event="clear" class="cp">⑧배속 원래대로 돌리기</button>
                        <button data-event="toggle" class="cp">⑨컨트롤러 보이기/숨기기</button>
                        <button data-event="repeat" class="cp">⑩반복 켜기/끄기</button>
                        <button data-event="auto" class="cp">⑪자동재생 켜기/끄기</button>
                    </div>
                </div>
            </section>
            <section class="inner df fc ac" style="margin-top: 200px;">
                <h1 class="t cb">전체 상품</h1>
                <div class="w df g40">
                    <div class="df fc g20 as" style="width: 100px;">
                        <h1 class="f20 b">카테고리</h1>
                        <div class="df fc g5 cg">
                            <p class="cb">건강식품</p>
                            <p class="cg">디지털</p>
                            <p class="cg">팬시</p>
                            <p class="cg">향수</p>
                            <p class="cg">헤어케어</p>
                        </div>
                    </div>
                    <div class="df as">
                        <h1 class="f20 b pa">상품</h1>
                        <div class="df fw g40">
                        <div class="df fc g5" style="padding-top: 50px;">
                                <h1 class="cg f20 b">건강식품</h1>
                                <div class="df fc g40 fw">
                                    <?php
                            $products = DB::fetchAll("SELECT * FROM Product");
                            foreach($products as $product):
                                if($product->category == "건강식품"):
                                ?>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s"><?=$product->name?></p>
                                                <p class="f12 cg s"><?=$product->description?></p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin"><?=number_format($product->price);?></p>
                                                    <?php if($product->sale != '일반'): ?>
                                                        <?php
                                                        $price = $product->price;
                                                        if($product->sale == "만원") $price = $price - 10000;
                                                        else if($product->sale == "10퍼") $price = $price - ($price * .1);
                                                        else if($product->sale == "30퍼") $price = $price - ($price * .3);
                                                        ?>
                                                    <div class="f18 sale b"><?=number_format($price)?></div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><a href="cartCtrl.php?action=insert&productIdx=<?=$product->idx?>&memberIdx=<?=$member->idx?>" class="df jc ac w b5 bg cw cp hd">장바구니담기</a></div>
                                </div>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                                <h1 class="cg f20 b">디지털</h1>
                                <div class="df fc g40 fw">
                                    <?php
                            $products = DB::fetchAll("SELECT * FROM Product");
                            foreach($products as $product):
                                if($product->category == "디지털"):
                                ?>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s"><?=$product->name?></p>
                                                <p class="f12 cg s"><?=$product->description?></p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin"><?=number_format($product->price);?></p>
                                                    <?php if($product->sale != '일반'): ?>
                                                        <?php
                                                        $price = $product->price;
                                                        if($product->sale == "만원") $price = $price - 10000;
                                                        else if($product->sale == "10퍼") $price = $price - ($price * .1);
                                                        else if($product->sale == "30퍼") $price = $price - ($price * .3);
                                                        ?>
                                                    <div class="f18 sale b"><?=number_format($price)?></div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><a href="cartCtrl.php?action=insert&productIdx=<?=$product->idx?>&memberIdx=<?=$member->idx?>" class="df jc ac w b5 bg cw cp hd">장바구니담기</a></div>
                                </div>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                                <h1 class="cg f20 b">팬시</h1>
                                <div class="df fc g40 fw">
                                    <?php
                            $products = DB::fetchAll("SELECT * FROM Product");
                            foreach($products as $product):
                                if($product->category == "팬시"):
                                ?>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s"><?=$product->name?></p>
                                                <p class="f12 cg s"><?=$product->description?></p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin"><?=number_format($product->price);?></p>
                                                    <?php if($product->sale != '일반'): ?>
                                                        <?php
                                                        $price = $product->price;
                                                        if($product->sale == "만원") $price = $price - 10000;
                                                        else if($product->sale == "10퍼") $price = $price - ($price * .1);
                                                        else if($product->sale == "30퍼") $price = $price - ($price * .3);
                                                        ?>
                                                    <div class="f18 sale b"><?=number_format($price)?></div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><a href="cartCtrl.php?action=insert&productIdx=<?=$product->idx?>&memberIdx=<?=$member->idx?>" class="df jc ac w b5 bg cw cp hd">장바구니담기</a></div>
                                </div>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                                <h1 class="cg f20 b">향수</h1>
                                <div class="df fc g40 fw">
                                    <?php
                            $products = DB::fetchAll("SELECT * FROM Product");
                            foreach($products as $product):
                                if($product->category == "향수"):
                                ?>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s"><?=$product->name?></p>
                                                <p class="f12 cg s"><?=$product->description?></p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin"><?=number_format($product->price);?></p>
                                                    <?php if($product->sale != '일반'): ?>
                                                        <?php
                                                        $price = $product->price;
                                                        if($product->sale == "만원") $price = $price - 10000;
                                                        else if($product->sale == "10퍼") $price = $price - ($price * .1);
                                                        else if($product->sale == "30퍼") $price = $price - ($price * .3);
                                                        ?>
                                                    <div class="f18 sale b"><?=number_format($price)?></div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><a href="cartCtrl.php?action=insert&productIdx=<?=$product->idx?>&memberIdx=<?=$member->idx?>" class="df jc ac w b5 bg cw cp hd">장바구니담기</a></div>
                                </div>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                                <h1 class="cg f20 b">헤어케어</h1>
                                <div class="df fc g40 fw">
                                    <?php
                            $products = DB::fetchAll("SELECT * FROM Product");
                            foreach($products as $product):
                                if($product->category == "헤어케어"):
                                ?>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s"><?=$product->name?></p>
                                                <p class="f12 cg s"><?=$product->description?></p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin"><?=number_format($product->price);?></p>
                                                    <?php if($product->sale != '일반'): ?>
                                                        <?php
                                                        $price = $product->price;
                                                        if($product->sale == "만원") $price = $price - 10000;
                                                        else if($product->sale == "10퍼") $price = $price - ($price * .1);
                                                        else if($product->sale == "30퍼") $price = $price - ($price * .3);
                                                        ?>
                                                    <div class="f18 sale b"><?=number_format($price)?></div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><a href="cartCtrl.php?action=insert&productIdx=<?=$product->idx?>&memberIdx=<?=$member->idx?>" class="df jc ac w b5 bg cw cp hd">장바구니담기</a></div>
                                </div>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                            </div>
                            
                        </div>                        
                        </div>
                    </div>
            </div>
        </section>
        <section class="inner df je" style="padding: 50px 0;">
            <button id="bba" class="bm cw b5 bx cp modal-toggle" style="padding: .5em 1em">비회원주문</button>     
            <dialog id="modal" class="df ac jc w h pf z100 p100 dn"  style="right: 0; top: 0; background-color: rgba(0, 0, 0, .8);">
                <div class="bw w h b10 bx" style="padding: 35px;">
                    <div>
                        <div class="df jsb ac" style="border-bottom: 1px solid #eee; padding-bottom: 5px;">
                            <h1 class="cb f30">주문하기</h1>
                            <div class="f24 cp modal-toggle">Ⅹ</div>
                        </div>
                        <div class="df g5 cg l" style="margin-top: 5px;">
                            <p class="auth">비회원</p>
                            <p id="uuid">ID: ???</p>
                        </div>
                    </div>
                    <div class="df w h" style="margin-top: 40px; height: 450px;">
                        <div id="allp" class="w df g20 fw" style="overflow-y: scroll;">

                        </div>
                        <div id="buy-area" class="w df g20 fw" style="overflow-y: scroll;">

                        </div>
                    </div>
                    <div class="df ae fc jsb">
                        <div><h1 class="f30" id="price">asdasd</h1></div>
                        <button id="buy" class="bm cw b5 bx cp modal-toggle" style="padding: .5em 1em;">구매하기</button>
                    </div>
                </div>
            </dialog>
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
    <script src="./script/sub02.js"></script>
</body>
</html>
