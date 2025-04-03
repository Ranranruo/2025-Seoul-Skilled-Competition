const StringToInt = (value) => {
    if(typeof value == "string") value = parseInt(value.replaceAll(",", ""));
    return value;
}

const ad = () => {
    const $video = document.querySelector("video");
    const $$btns = document.querySelectorAll(".ad-btns > button");
    $video.autoplay = document.cookie == "auto";
    const events = {
        play: () => $video.play(),
        pause: () => $video.pause(),
        stop: () => {$video.pause(); $video.currentTime = 0},
        back: () => $video.currentTime -= 10,
        go: () => $video.currentTime += 10,
        slow: () => $video.playbackRate -= .1,
        fast: () => $video.playbackRate += .1,
        clear: () => $video.playbackRate = 1,
        control: () => $video.toggleAttribute("controls"),
        repeat: () => $video.toggleAttribute("loop"),
        auto: () => { document.cookie = document.cookie == "auto" ? "asdasd" : "auto" }
    }
    $$btns.forEach(btn => btn.addEventListener("click", (e) => events[e.target.dataset.event]()))
}
ad();

const modal = () => {
    const $productList = document.querySelector(".modal-productList");
    const $orderList = document.querySelector(".modal-orderList");
    const $orderArea = document.querySelector("#orderArea");
    const $$categoryBtns = document.querySelectorAll(".modal-btns button");
    const $alret = document.querySelector("#alert");
    const $submit = document.querySelector("#submit");
    const $total = document.querySelector("#modal-total");
    const state = new Proxy({
        uuid: crypto.randomUUID().substring(0, 6),
        category: '',
        buyList: [],
        total: 0
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            if(prop == "total") return true;
            render();
        }
    });
    $$categoryBtns.forEach(btn => btn.addEventListener("click", (e) => {
        state.category = btn.dataset.type;
    }))
    const render = async () => {
        // 전시영역
        let data = await fetch("./product.json").then(data => data.json());
        state.total = data.reduce((acc, data) => {
            if(!state.buyList.includes(data.idx)) return acc;
            return acc + (StringToInt(data.price) * state.buyList.filter(buy => buy == data.idx).length);
        }, 0)
        $total.innerHTML = "\\" + state.total.toLocaleString();
        if(state.category != '') data = data.filter(data => data.category == state.category)
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data, null, state.buyList.includes(data.idx));
        }, '');

        $productList.innerHTML = html;
        
        // 주문영역
        data = await fetch('./product.json').then(data => data.json());
        data = data.filter(data => state.buyList.includes(data.idx));
        html = data.reduce((acc, data) => {
            
            return acc + getHtml(data, state.buyList.filter(buy => buy == data.idx).length);
        }, '');

        $orderList.innerHTML = html;
        setEvent();
    }

    const setEvent = () => {
        $productList.querySelectorAll(".product").forEach(el => {
            el.addEventListener("dragend", (e) => {
                if(setIn(e)) state.buyList.push(el.dataset.idx);
                render();
            })
        });
        $orderList.querySelectorAll(".product").forEach(el => {
            el.addEventListener("dragend", (e) => {
                if(!setIn(e)) state.buyList =  state.buyList.filter(data => data != el.dataset.idx);
            })
            el.querySelector(".minus").addEventListener("click", (e) => {
                const idx = state.buyList.findIndex(data => data == el.dataset.idx)
                state.buyList.splice(idx, 1);
                render();
            });
        })
    }
    $submit.addEventListener("click", (e) => {
        $alret.style.display = "flex";
        $alret.innerHTML = `방금 비회원 ${state.uuid}님이 ${state.total}원을 결제하셨습니다!`;
        state.buyList = [];
        setTimeout(() => {
            $alret.style.display = 'none';
        }, 3000)
    });
    const getHtml = (data, count = null, isBuy = false) => {
        return `
        <li class="product bx2 b10 oh" style="width: 250px; opacity: ${isBuy ? '.5' : '1'}" data-idx='${data.idx}' draggable="true">
            <div class="bi df as je g10" style="background-image: url('${data.img}'); aspect-ratio: 1/.7; border-end-start-radius: 70px; padding: 10px;">
            <div class="f10 bs cm b5 btn1 bx2">${data.category}</div>
            ${data.sale != null ? `<div class="f10 bs cm b5 btn1 bx2">SALE</div>` : ''}
            </div>
            <div class="df fc g10" style="padding: 15px;">
                <div class="w df fc"><p class="s b f18">${data.name}</p><p class="s cg f14">${data.description}</p></div>
                ${getPrice(data.price, data.sale)}
                ${count != null ? `<div class="df ac g10"><button class="bw1 f30 minus" data-idx='${data.idx}'>-</button><p class="f20">${count}</p><button class="bw1 f30 plus" data-idx='${data.idx}'>+</button></div>` : ''}
            </div>
        </li>
        `;
    }
    const getPrice = (price, sale) => {
        let intP = StringToInt(price);
        if(sale == null) return `<div class="price df g5 b cm"><div class="origin">${intP.toLocaleString()}</div></div>`;
        return `<div class="price df g5 b cm"><div class="origin">${intP.toLocaleString()}</div><div class="sale">${(sale == 10000 ? intP - 10000 : intP - (intP * sale)).toLocaleString()}</div></div>`;
    }
    render();
    const setIn = (event) => {
        const x = event.clientX;
        const y = event.clientY;
        const p = $orderArea.getBoundingClientRect();
        return (x <= p.right && x >= p.left && y >= p.top && y <= p.bottom);
    }
}
modal();