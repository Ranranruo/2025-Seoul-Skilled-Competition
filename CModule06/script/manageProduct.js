const products = () => {
    const $addProduct = document.querySelector("#addProduct");
    const $productList = document.querySelector("#productList");
    const $$orderBtns = document.querySelectorAll(".orderBtns > button");
    const state = new Proxy({
        order: 1
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            render();
        }
    })
    $$orderBtns.forEach(el => el.addEventListener("click", (e) => state.order = e.target.dataset.order));
    const render = async () => {
        let data = await fetch("./productCtrl.php?action=fetchAll").then(data => data.json());
        data = data.toSorted((a, b) => (new Date(b.date) - new Date(a.date) * state.order));
        console.log(state);
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data);
        }, '');
        $productList.innerHTML = html;
        setEvent();
    }

    const setEvent = () => {
        document.querySelectorAll("form").forEach(el => {
            el.addEventListener("submit", (e) => {
                let valid = true;
                [...e.target].forEach(data => {
                    console.log(data, data.value)
                    if(data.classList.contains("fakeImg")) return;
                    if(data.value.replaceAll(" ", "") == "") valid = false;
                })
                if(!valid) {
                    alert("모든 항목에 값을 추가해주세요");
                    e.preventDefault();
                }
                
            }
        )
        
        el.querySelector(".fakeImg").addEventListener("change", (e) => {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (data) => {
                el.querySelector("label").style.backgroundImage = `url('${data.target.result}')`;
                el.querySelector("input[name=img]").value = data.target.result;
            }
            })

});
    }
    const getHtml = (data) => {
        return `
        <form id="addProduct" method="post" action="productCtrl.php" class="bx2 bw1 b10 df jsb ac" style="height: 200px; padding: 20px;">
            <div class="df w h g20">
                <input type="text" name="action" value="update" hidden>
                <input type="text" value="${data.idx}" name="idx" hidden>
                <input type="text" name="img" hidden value="${data.img}">
                <input type="file" id="fakeImg${data.idx}" class="fakeImg" hidden accept="image/*">
                <label class="b10 bi h df jc ac f20 b cw1" style="aspect-ratio: 1/1; background-image: url('${data.img}')" for="fakeImg${data.idx}"></label>
                <div class="text df fc jc g5">
                    <input class="b f20 bx2 b5 btn1" placeholder="name" name="name" value="${data.name}" />
                    <input class="s w b b5 bx2 btn1" style="width: 400px;" placeholder="description" name="description" value="${data.description}"/>
                    <input class="cm btn1 b5 bx2" type="number" placeholder="price" name="price" value="${data.price}">
                    <select class="btn1 b5 bx2" id="" name="category">
                                    <option ${data.category == "건강식품" ? "selected" : ""} value="건강식품">건강식품</option>
                                    <option ${data.category == "디지털" ? "selected" : ""} value="디지털">디지털</option>
                                    <option ${data.category == "팬시" ? "selected" : ""} value="팬시">팬시</option>
                                    <option ${data.category == "향수" ? "selected" : ""} value="향수">향수</option>
                                    <option ${data.category == "헤어케어" ? "selected" : ""} value="헤어케어">헤어케어</option>
                                </select>
                    <select class="btn1 b5 bx2" name="sale" id="" placeholder="sale" name="sale">
                        <option disabled>sale</option>
                        <option value="0" ${data.sale == 0 ? 'selected' : ''}>기본</option>
                        <option value="10000" ${data.sale == 10000 ? 'selected' : ''}>만원할인</option>
                        <option value="0.1" ${data.sale == 0.1 ? 'selected' : ''}>10%할인</option>
                        <option value="0.3 ${data.sale == 0.3 ? 'selected' : ''}">30%할인</option>
                    </select>
                    
                </div>
            </div>
            <div class="df fc g20">
                <button type="submit" class="btn1 bm cw1 b5 hd b f20" value="a" style="width: 100px;">수정</button>
                <a href="productCtrl.php?action=delete&idx=${data.idx}" class="df jc ac btn1 bw3 cb b5 hd b f20" value="a" style="width: 100px;">삭제</a>
            </div>
        </form>`;
    }
    render();
}
products();