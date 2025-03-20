
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
            <section class="inner df fc g40">
                <h1 class="t">판매상품관리[관리자]</h1>
                <div class="df fc g40">
                    <form class="df jse ac" action="productCtrl.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="img" hidden>
                        <input required type="text" name="action" value="insert" hidden>
                        <div class="df g20 ac">
                            <input required class="bi b5 bg" style="width: 120px; aspect-ratio: 1/1;" type="file" placeholder="상품사진" name="fakeImg" type="image/*">
                            <div class="df fc g5">
                                <input required class="f20" placeholder="상품명" name="name"/>
                                <input required class="f14 cg" style="width: 300px;" placeholder="상품 설명" name="description"/>
                            </div>
                        </div>
                        <input required class="f22" type="number" placeholder="상품가격" min="0" name="price"/>
                        <select required class="f22 b5 bx bn" style="padding: .5em 1em;" name="category">
                            <option value="건강식품">건강식품</option>
                            <option value="디지털">디지털</option>
                            <option value="팬시">팬시</option>
                            <option value="향수">향수</option>
                            <option value="헤어케어">헤어케어</option>
                        </select>
                        <select required class="f22 b5 bx bn" style="padding: .5em 1em;" placeholder="세일" name="sale">
                            <option value="일반">일반상품</option>
                            <option value="만원">만원할인(인기)</option>
                            <option value="10퍼">10%할인(인기)</option>
                            <option value="30퍼">30%할인(인기)</option>
                        </select>
                        <div class="f26 b">
                            <button class="b10 bm cw f20" style="padding: .5em 1em;">추가</button>
                        </div>
                    </form>
                    <?php
                        $products = DB::fetchAll("SELECT * FROM Product");
                        foreach($products as $product): 
                    ?>
                    <form class="df jse ac" action="productCtrl.php" method="post" enctype="multipart/form-data">
                        <input type="text" hidden value="<?=$product->idx?>" name="idx">
                        <input type="text" name="img" hidden value="<?=$product->img?>">
                        <input required type="text" name="action" value="update" hidden>
                        <div class="df g20 ac">
                            <div class="bi b5 bg" style="width: 120px; aspect-ratio: 1/1; background-image: url('<?=$product->img?>')">
                                <input type="file" placeholder="상품사진" name="fakeImg" type="image/*">
                            </div>
                            <div class="df fc g5">
                                <input required class="f20" placeholder="상품명" name="name" value="<?=$product->name?>"/>
                                <input required class="f14 cg" style="width: 300px;" placeholder="상품 설명" name="description" value="<?=$product->description?>"/>
                            </div>
                        </div>
                        <input required class="f22" type="number" placeholder="상품가격" min="0" name="price" value="<?=$product->price?>"/>
                        <select required class="f22 b5 bx bn" style="padding: .5em 1em;" name="category">
                            <option <?=$product->category == "건강식품" ? 'selected' : ''?> value="건강식품">건강식품</option>
                            <option <?=$product->category == "디지털" ? 'selected' : ''?> value="디지털">디지털</option>
                            <option <?=$product->category == "팬시" ? 'selected' : ''?> value="팬시">팬시</option>
                            <option <?=$product->category == "향수" ? 'selected' : ''?> value="향수">향수</option>
                            <option <?=$product->category == "헤어케어" ? 'selected' : ''?> value="헤어케어">헤어케어</option>
                        </select>
                        <select required class="f22 b5 bx bn" style="padding: .5em 1em;" placeholder="세일" name="sale">
                            <option <?=$product->sale == "일반" ? "selected" : ''?> value="일반">일반상품</option>
                            <option <?=$product->sale == "만원" ? "selected" : ''?> value="만원">만원할인(인기)</option>
                            <option <?=$product->sale == "10퍼" ? "selected" : ''?> value="10퍼">10%할인(인기)</option>
                            <option <?=$product->sale == "30퍼" ? "selected" : ''?> value="30퍼">30%할인(인기)</option>
                        </select>
                        <div class="f26 b df fc g10">
                            <button class="b10 bg cw f20" style="padding: .5em 1em;">수정</button>
                            <a href="productCtrl.php?action=delete&idx=<?=$product->idx?>" class="b10 bm cw f20 l" style="padding: .5em 1em;">삭제</a>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </div>
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
    <script>
        document.querySelectorAll("form").forEach(form => form.addEventListener("submit", (e) => {
            e.preventDefault();
            const reader = new FileReader();
            if(!e.target.fakeImg.files[0]) e.target.submit();
            reader.readAsDataURL(e.target.fakeImg.files[0]);
            reader.onload = async () => {
                e.target.img.value = reader.result;
                e.target.submit();
            }
        }));
    </script>
</body>
</html>