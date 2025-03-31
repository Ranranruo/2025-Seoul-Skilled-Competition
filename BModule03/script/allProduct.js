const $video = document.querySelector("video");
const $$btns = document.querySelectorAll(".ad button");
const ad = {
    play: () => $video.play(),
    pause: () => $video.pause(),
    stop: () => { $video.pause(); $video.currentTime = 0},
    back: () => $video.currentTime -= 10 ,
    go: () => $video.currentTime += 10,
    slow: () => $video.playbackRate -= .1,
    fast: () => $video.playbackRate += .1,
    clear: () => $video.playbackRate = 1,
    control: () => $video.toggleAttribute("controls"),
    repeat: () => $video.toggleAttribute("loop"),
    auto: () => $video.toggleAttribute("autoplay")
}
$$btns.forEach(btn => btn.addEventListener("click", (e) => ad[e.target.dataset.event]()));

// 비회원 주문
const state = {
    uuid: crypto.randomUUID().substring(0, 6),
    category: null,
    buyList: [],
    totalPrice: 0
}
const $productList = document.querySelector("#productList");
const $orderList = document.querySelector("#orderList");
const $$categoryBtn = document.querySelectorAll(".btns button");
document.querySelector("#uuid").innerHTML = `비회원 ID: ${state.uuid}`;

document.querySelector("#payment").addEventListener("click", (e)=> {
    document.querySelector("#ismodal").checked = false;
    const $alert = document.querySelector("#alert");
    $alert.classList.remove("dn");
    $alert.innerHTML = state.uuid + " 님이 " + state.totalPrice + "원을 결제하셨습니다.";
    setTimeout(()=>{
        $alert.classList.add("dn");
    }, 3000)
    state

});

const render = async () => {
    let data = await fetch("./product.json").then(data => data.json());
    state.totalPrice = data.reduce((acc, data) => {
        if(!state.buyList.includes(data.idx)) return acc + parseInt(data.price.replaceAll(",", "")) * state.buyList.filter(buy => data.idx + "" == buy).length;
        return acc + data;
    }, 0);
    document.querySelector("#totalPrice").innerHTML = "\\" + state.totalPrice.toLocaleString();
    if(state.category) data = data.filter(data => data.category == state.category);
    let html = data.reduce((acc, data) => {
        return acc + getHtml(data, false, state.buyList.filter(buy => buy ==  data.idx + "").length);
    }, '');
    $productList.innerHTML = html;
    $productList.querySelectorAll("li").forEach(el => el.addEventListener("dragend", (e)=> {
        const order = $orderList.getBoundingClientRect();
        const x = e.clientX;
        const y = e.clientY;
        if(x >= order.left && x <= order.right && y <= order.bottom && y >= order.top) state.buyList.push(e.target.dataset.idx);
        render();
    }));

    data = await fetch("./product.json").then(data => data.json());
    data = data.filter(data => state.buyList.includes(data.idx + ""));
    html = data.reduce((acc, data) => {
        return acc + getHtml(data, true, state.buyList.filter(buy => buy ==  data.idx + "").length);
    }, '');
    $orderList.innerHTML = html;
    $orderList.querySelectorAll("li").forEach(el => {
        el.addEventListener("dragend", (e) => {
            const order = $orderList.getBoundingClientRect();
            const x = e.clientX;
            const y = e.clientY;
            if(!(x >= order.left && x <= order.right && y <= order.bottom && y >= order.top)) 
                state.buyList = state.buyList.filter(buy => buy != e.target.dataset.idx + "");
            render();
        });
        el.querySelector(".plus").addEventListener("click", ()=>{
            state.buyList.push(el.dataset.idx);
            render();
        });
        el.querySelector(".minus").addEventListener("click", ()=>{
            const idx = state.buyList.findIndex(data => data == el.dataset.idx);
            state.buyList.splice(idx, 1);
            render();
        });
    });
}

const getHtml = (data, isOrder = false, count = 0) => {
    return `    
    <li class="bx2 b15 oh df fc cp bw1" style="width: ${isOrder ? "160" : "190"}px; ${count != 0 && !isOrder ? 'filter: brightness(.9);' : ''}" draggable='true' data-idx='${data.idx}'>
        <div class="bi df as je w h g10" style="height: 140px; padding: 10px; border-end-start-radius: 25px; background-image: url('${data.img}');"><p class="f10 b btn1 bs cm bx">${data.category}</p>${data.sale != null ? '<p class="f10 b btn1 bs cm bx">SALE</p>' : ''}</div>
        <div class="df fc g10 jsb as" style="padding: 15px;">
            <div class="w"><p class="b f18 s">${data.name}</p><p class="s cg f12">${data.description}</p></div>
            <div class="price df f14 b cm" style="gap: 6px;">${priceHTML(data.price, data.sale)}</div>
            ${isOrder ? `<div class="df ac g10" style="align-self: flex-end;"><button class="bw1 b f20 minus">-</button><p class="b f14">${count}</p><button class="bw1 b f20 plus">+</button></div>` : ''}
        </div>
    </li>
    `;
}
const priceHTML = (price, sale) => {
    if(typeof price == 'string') price = parseInt(price.replaceAll(",", ""));
    if(sale == null) return `<p class="origin">${price.toLocaleString()}</p>`;
    if(sale == 10000) return `<p class="origin">${price.toLocaleString()}</p><p class='sale'>${(price - 10000).toLocaleString()}</p>`;
    else return `<p class="origin">${price.toLocaleString()}</p><p class='sale'>${(price - (price * sale)).toLocaleString()}</p>`;
}

$$categoryBtn.forEach(btn => btn.addEventListener("click", (e) => {
    state.category = e.target.dataset.type;
    $$categoryBtn.forEach(el => {
        if(el.dataset.type == state.category) {
            el.classList.remove("disable")
            el.classList.add("active");
        } else {
            el.classList.remove("active");
            el.classList.add("disable")
        }
    })
    render();
}));

render();