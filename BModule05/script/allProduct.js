const ad = () => {
    const events = {
        play: () => $video.play(),
        pause: () => $video.pause(),
        stop: () => {$video.currentTime = 0, $video.pause();},
        back: () => $video.currentTime -= 10,
        go: () => $video.currentTime += 10,
        slow: () => $video.playbackRate -= .1,
        fast: () => $video.playbackRate += .1,
        clear: () => $video.playbackRate = 1,
        control: () => $video.toggleAttribute("controls"),
        repeat: () => $video.toggleAttribute("loop"),
        auto: () => $video.toggleAttribute("autoplay")
    };
    const $video = document.querySelector("video");
    const $$btns = document.querySelectorAll("#ad button");

    $$btns.forEach(btn => btn.addEventListener("click", (e) => {
        events[e.target.dataset.event]();
    }))
}
ad();


const order = () => {
    const state = {
        uuid: crypto.randomUUID().substring(0, 6),
        buyList: [],
        category: '',
        totalPrice: 0,
    }
    const $submit = document.querySelector("#submit");
    const $orderList = document.querySelector('#orderList');
    const $buyList = document.querySelector("#buyList");
    const $uuid = document.querySelector(".uuid");
    const $$categoryBtn = document.querySelectorAll(".categoryBtn button");
    const $totalPrice = document.querySelector("#totalPrice");
    const $alert = document.querySelector(".alert");
    // 렌더링
    $$categoryBtn.forEach(btn => btn.addEventListener("click", (e) => {state.category = e.target.dataset.type; render();}))
    const render = async() => {
        $uuid.innerHTML = `비회원 ID: ${state.uuid}`
        let data = await fetch('./product.json').then(data => data.json());
        const totalPrice = data.reduce((acc, data) => {
            if(!state.buyList.includes(data.idx)) return acc;
            let price = data.price;
            if(typeof price == "string") price = parseInt(price.replaceAll(",", ""));
            return acc + (price * state.buyList.filter(idx => idx == data.idx).length);
        }, 0)
        state.totalPrice = totalPrice;
        $totalPrice.innerHTML = "\\" + totalPrice.toLocaleString();
        data = state.category != '' ? data.filter(data => data.category == state.category) : data;
        let html = data.reduce((acc, data) => {
            const buyable = state.buyList.includes(data.idx);
            return acc + getHtml(data, buyable);
        }, '');
        $orderList.innerHTML = html;
        $orderList.querySelectorAll(".product").forEach(product => product.addEventListener("dragend", (e) => {
            if(checkInOrder(e)) state.buyList.push(e.target.dataset.idx);
            render();
        }));

        data = await fetch('./product.json').then(data => data.json());
        data = data.filter(data => state.buyList.includes(data.idx));
        html = data.reduce((acc, product) => {
            const count = state.buyList.filter(idx => idx == product.idx).length;
            return acc + getHtml(product, false, count);
        }, ''); 
        $buyList.innerHTML = html;
        $buyList.querySelectorAll(".product").forEach(el => el.addEventListener("dragend", (e) => {
            if(!checkInOrder(e)) state.buyList = state.buyList.filter(idx => idx != e.target.dataset.idx);
            render();
        }))
        document.querySelectorAll(".minus").forEach(el => el.addEventListener("click", (e) => {
            const idx = state.buyList.findIndex(data => data == e.target.dataset.idx);
            state.buyList.splice(idx, 1);
            render();
        }));
        document.querySelectorAll(".plus").forEach(el => el.addEventListener("click", (e) => {
            state.buyList.push(e.target.dataset.idx);
            render();
        }));
    };
    render();
    const getHtml = (data, buyable = false, count = null) => {
            return `<li style="width: ${count == null ? '240px' : '185px'}; opacity: ${buyable ? ".5" : "1"}" class="oh b10 bx2 product bw1" draggable='true' data-idx="${data.idx}">
                <div class="bi as je df g5" style="aspect-ratio: 1/.7; background-image: url('${data.img}'); border-end-start-radius: 50px; padding: 10px">
                    <p class="f12 bs cm b5 b" style="padding: .2em .7em">${data.category}</p>
                ${data.sale != null ? '<p class="b f12 bs cm b5" style="padding: .2em .7em">SALE</p>' : ''}
                </div>
                <div class="df fc g10" style="padding: 15px;">
                    <div>
                        <h1 class="f20 s">${data.name}</h1>
                        <p class="cg f14 s">${data.description}</p>
                    </div>
                    ${getPrice(data.price, data.sale)}
                    <!--<div class="df jsb"><a class="btn1 b f14 b5 bm cw1 hd">구매하기</a><a class="bw3 btn1 b f14 hd b5">장바구니담기</a></div>-->
                    ${count != null ? `<div class="df g10"><button data-idx='${data.idx}' class="minus bw1">-</button><p class="bw1">${count}</p><button class="bw1 plus" data-idx='${data.idx}'>+</button></div>` : ''}
                </div>
            </li>`;
        }
    const getPrice =(price, sale) => {
            if(typeof price == "string") price = parseInt(price.replaceAll(",", ""));
            if(sale == null) return `<div class="df g5 b  cm"><p class="origin">${price.toLocaleString()}</p></div>`;
            else return `<div class="df g5 b  cm"><p class="origin">${price.toLocaleString()}</p><p class="sale">${(sale == 10000 ? price - 10000 : price - (price - price * sale)).toLocaleString()}</p></div>`;
    }
    const checkInOrder = (event) => {
        const p = $buyList.getBoundingClientRect();
        const x = event.clientX;
        const y = event.clientY;
        return ((p.left <=x) && (p.right >= x) && (p.bottom >= y) && (p.top <= y));
    }
    $submit.addEventListener("click", (e) => {
        $alert.classList.remove("dn");
        $alert.innerHTML = `방금 비회원 ${state.uuid}님이 ${state.totalPrice.toLocaleString()}원을 결제하셨습니다!`;
        setTimeout(()=>{$alert.classList.add("dn")},3000)
        state.buyList = [];
        state.category = '';
        state.totalPrice = 0;
        render();
    });
}

order();