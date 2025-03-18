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
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image1.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">이뮨 멀티비타민&미네랄</p>
                                                <p class="f12 cg s">국내 판매 1위 멀티비타민 이뮨 14일분에 이중제형 + 남/녀 맞춤설계 포뮬러를 적용한 신제품</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">75,000</p>
                                                    <div class="f18 sale b">65,000</div>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image2.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">센트룸</p>
                                                <p class="f12 cg s">생기 넘치는 일상을 위한 센트룸 우먼 더블업. 비타민 B군 8종 함량 2배, 23가지 비타민과 미네랄, 한국인 여성 맞춤 영양 설계</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">27,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image4.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">닥터브라이언</p>
                                                <p class="f12 cg s">달콤한 청포도맛 구미로 맛있게 비타민 C와 D를 충전하세요. 활기찬 하루와 튼튼한 뼈 건강을 맛있게 충전하는 부드러운 젤리 타입</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">2,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image5.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">액티브 멀티포맨</p>
                                                <p class="f12 cg s">미국판매 1위 내셔널 건강기능식품 브랜드. 남성 건강을 생각하는 22가지 주요 비타민&미네랄</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">30,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image6.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">네이처메이드B12</p>
                                                <p class="f12 cg s">여성 건강을 생각하는 23가지 주요 비타민&미네랄, 한국인 1일 영양 권장량을 고려한 철분, 엽산이 강화된 여성종합비타민</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">30,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                            <h1 class="cg f20 b">디지털</h1>
                            <div class="df fc g40 fw">
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image10.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">파이널마우스 스타라이트12 페가수스 미디엄</p>
                                                <p class="f12 cg s">최첨단 펌웨어를 갖춘 업계 최고의 노르딕 RF 플랫폼 기반의 무선 기술 채용, 최대 20,000CPI 해상도를 갖춘 e스포츠 센서 채용</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">1,254,000</p>
                                                    <p class="f18 sale">1,128,600</p>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                </div>
                                                <p class="f14 cg">3,000원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image7.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">PANTONE PD충전 보조배터리</p>
                                                <p class="f12 cg s">230g의 가벼운 무게로 휴대성 극대화, 3way 빌트인 케이블 채용, 10,000mAh의 대용량 배터리팩 내장</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">24,400</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image8.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">Bowie D05 무선 블루투스 5.3 헤드셋 </p>
                                                <p class="f12 cg s">현실같은 3D사운드 스테이지 제공, 70시간의 오디오 재생시간, 2시간으로 완전 충전</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">36,900</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image9.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">독거미 F99 기계식 키보드</p>
                                                <p class="f12 cg s">최고의 퍼포먼스를 경험하게 해주는 키보드, 안정적인 무선 전송, 저소음 디자인, 일체형 실리콘 패드 디자인으로 소음 최소화, 프리미엄 PCB기판 채용으로 안정적이고 편안한 타건감 제공 </p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">70,750</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                               
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image11.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">보이저5200 블루투스 이어폰</p>
                                                <p class="f12 cg s">4개의 마이크 탑재, 6중 바람차단, 강력한 노이즈 캔슬링, 공간의 소음을 최대로 줄여 최적의 업무 환경을 경험할 수 있습니다.</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">146,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                            <h1 class="cg f20 b">팬시</h1>
                            <div class="df fc g40 fw">
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image15.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">게이밍 이어폰 VJJB NI</p>
                                                <p class="f12 cg s">세계 1위 가성비 유선 이어폰. 듀얼 드라이버 기술로 완벽한 고품질 사운드와 교체가 가능한 분리형 커스텀 케이블</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">38,900</p>
                                                    <p class="f18 sale">28,900</p>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image12.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">명품 자동 장우산</p>
                                                <p class="f12 cg s">태풍에도 견디는 프리미엄 우드 장우산. 50개 이상 구매 시 손잡이 무료 각인 서비스 제공</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">31,600</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image13.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">14K 윙블링 원터치 링 귀걸이(주문제작)</p>
                                                <p class="f12 cg s">언제나 당신의 일상에 '편안한 멋' 평범한 순간마저 매력을 돋보이게 만들어 줄 14K Daily Collection. 본 상품은 주문 제작으로 배송은 약 7~10일 정도 소요됩니다(주말 및 공휴일 제외).</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">250,000</p>
                                                </div>
                                                <p class="f14 cg">3,000원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image14.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">14K 윙블링 메르시 목걸이(주문제작)</p>
                                                <p class="f12 cg s">언제나 변함없고 고급스러운 전체 14K 골드로 제작되어 소장 가치뿐만 아니라 우아한 아름다움을 선사합니다. 본 상품은 주문 제작으로 배송은 약 7~10일 정도 소요됩니다(주말 및 공휴일 제외).</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">265,000</p>
                                                </div>
                                                <p class="f14 cg">3,000원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image16.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">인스탁스 미니 에보</p>
                                                <p class="f12 cg s">당신이 보는 세상을 보여주세요. 가장 혁신적인 프리미엄 클래식 하이브리드 카메라, 묵직한 세련됨이 돋보이는 mini Evo의 클래식 디자인을 만나보세요.</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">320,000</p>
                                                </div>
                                                <p class="f14 cg">3,000원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                            <h1 class="cg f20 b">향수</h1>
                            <div class="df fc g40 fw">
                            <div class="df fc g10" style="width: 250px;">
                                <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image20.png'); margin-bottom: 5px;"></div>
                                    <div class="df fc g5">
                                        <div>
                                            <p class="f18 b s">몽블랑 익스플로러 EDP 60ml</p>
                                            <p class="f12 cg s">전 세계를 여행하는 탐험가의 향기. 에너제틱 베르가못에서 자연스러운 패출리로 이어지는 향의 여정(우디 레더리 아로마틱)</p>
                                        </div>
                                        <div>
                                            <div class="df ac g5 price">
                                                <p class="f18 origin">103,000</p>
                                                <p class="f18 sale">93,000</p>
                                                <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                            </div>
                                            <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                        </div>
                                        <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                    </div>
                                <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                            </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image17.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">에스쁘아 솔리드 퍼퓸 4.2g</p>
                                                <p class="f12 cg s">새벽 달빛 아래 달큰한 체리가 어지럽게 흩어진 자리, 새하얀 자스민이 코끝을 스치고 자유롭게 남는 풍부한 머스크 향의 고체 향수</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">26,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image18.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">호텔도슨 향수 오드퍼퓸 75ml</p>
                                                <p class="f12 cg s">향긋하고 보드라운 마른 꽃과 나무 향 뒤로 낙엽이 타는 듯한 베티버 향이 퍼지는 스파이시 플로럴 향</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">153,000</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image19.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">랑방 레 플레르 EDT 90ml</p>
                                                <p class="f12 cg s">에너지 넘치고 빛나는 머스키 프루티 플로럴 향으로 부드러움과 반짝임의 완벽한 균형이 매력입니다.</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">64,500</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image21.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">캘빈클라인 One EDT 50ml</p>
                                                <p class="f12 cg s">남녀 모두에게 어울리는 현대적이며, 라이트한 향의 캘빈클라인 CK one 오 드 뚜왈렛. 상쾌하고 신선한 시트러스 계열의 향으로 편안하고 캐주얼한 향수</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">58,900</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="df fc g5" style="padding-top: 50px;">
                            <h1 class="cg f20 b">향수케어</h1>
                            <div class="df fc g40 fw">
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image26.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">닥터포헤어 피토프레시 헤어쿨링 스프레이 150ml</p>
                                                <p class="f12 cg s">열받아 예민해진 두피를 위한 즉각적인 두피 쿨링 솔루션. 온종일 느껴지는 상쾌함, 피토프레이 쿨링 스프레이</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">16,000</p>
                                                    <p class="f18 sale">14,400</p>
                                                    <div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                        <div class="df fc g10" style="width: 250px;">
                                            <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image22.png'); margin-bottom: 5px;"></div>
                                                <div class="df fc g5">
                                                    <div>
                                                        <p class="f18 b s">어노브 딥 데미지 트리트먼트 EX 더블</p>
                                                        <p class="f12 cg s">부드러움에 집착하다! 어노브 집착 헤어팩! 단백질 3,000% UP으로 완성하는 극손상모 솔루션</p>
                                                    </div>
                                                    <div>
                                                        <div class="df ac g5 price">
                                                            <p class="f18 origin">29,800</p>
                                                        </div>
                                                        <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                                    </div>
                                                    <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                                </div>
                                                <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                            </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image23.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">려 루트젠 여성맞춤 볼륨 탈모증상케어 샴퓨 353ml</p>
                                                <p class="f12 cg s">근거있는 여성탈모 전문가 려 루트젠이 만든 촘촘탄탄 밀도탄력을 채우는 3D볼륨 탈모 샴푸. 부드럽고 향 좋은 약산성 비건 샴푸</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">21,900</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image24.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">라보에이치 두피쿨링&노세범 샴푸 333ml</p>
                                                <p class="f12 cg s">청량하게 리프레쉬-쿨링샴푸, 오래도록 뽀송뽀송-노세범샴푸, 두피장벽강화 특허기술-탈모증상 완화 기능성 샴푸</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">19,800</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                <div class="df fc g10" style="width: 250px;">
                                    <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('./images/image25.png'); margin-bottom: 5px;"></div>
                                        <div class="df fc g5">
                                            <div>
                                                <p class="f18 b s">모로칸오일 헤어트리트먼트 100ml</p>
                                                <p class="f12 cg s">헤어케어, 컨디셔닝, 스타일링, 피니시까지 모두 가능한 단 하나의 헤어 오일 트리트먼트</p>
                                            </div>
                                            <div>
                                                <div class="df ac g5 price">
                                                    <p class="f18 origin">52,200</p>
                                                </div>
                                                <p class="f14 cg">2,500원 (20,000원 이상 무료배송)</p>
                                            </div>
                                            <p class="f10 cs">GIFTS카드 추가 10% 할인<br>GiftsMall 포인트 최대 1% 적립</p>
                                        </div>
                                    <div class="df g10 jsb"><button class="bm cw b5 w hd cp" style="padding: 5px 0">구매하기</button><button class="w b5 bg cw cp hd">장바구니담기</button></div>
                                </div>
                                
                                </div></div>
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
