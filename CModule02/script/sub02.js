// 컨트롤러 버튼들
const $$btns = document.querySelectorAll("#ad button");
// 비디오 요소
const $ad = document.querySelector("video");

// 이벤트들
const adEvents = {
    play: () => $ad.play(),
    pause: () => $ad.pause(),
    stop: () => { $ad.pause(); $ad.currentTime = 0},
    back: () => $ad.currentTime = $ad.currentTime <= 10 ? 0 : $ad.currentTime - 10,
    go: () => $ad.currentTime = $ad.currentTime + 10 > $ad.duration ? $ad.duration : $ad.currentTime + 10,
    slow: () => $ad.playbackRate > .11 ? $ad.playbackRate -= .1 : null,
    fast: () => $ad.playbackRate += .1,
    clear: () => $ad.playbackRate = 1,
    toggle: () => $ad.toggleAttribute("controls"),
    repeat: () => $ad.loop = !$ad.loop,
    auto: () => $ad.autoplay = !$ad.autoplay
}

// 이벤트 적용
$$btns.forEach($btn => $btn.addEventListener("click", (event) => {
    const evnetName = event.target.dataset.event;
    adEvents[evnetName]();
    console.log($ad.playbackRate);
}));


// 비회원
const state = {
    uuid: '',
    category: null,
    buyList: [

    ]
};

const $modal = document.querySelector("dialog");
const $buyArea = document.querySelector("#buy-area");
const $uuid = document.querySelector("#uuid");
const $buy = document.querySelector("#buy");
const $price = document.querySelector("#price")
const str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASFGHJKLZXCVBNM1234567890';

$buy.addEventListener("click", () => {
    const alert = document.createElement("div");
    alert.setAttribute("style", "top: 0; left: 0; z-index: 9999999999999999999")
    alert.classList = `df pf jc ac w h bm cw`
    alert.innerHTML = `
    <p>${state.uuid}님이 ${$price.innerText}을 결제하셨습니다!</p>
    `
    document.documentElement.append(alert);
    setTimeout(() => {
        alert.remove();
    }, 3000);
});

for(let i = 0; i < 6; i++) {
 state.uuid += str.charAt(Math.random() * str.length);
}
$uuid.innerText = `ID: ${state.uuid}`;
console.log(document.querySelectorAll(".modal-toggle"));
document.querySelectorAll(".modal-toggle").forEach(el => el.addEventListener("click", () => $modal.classList.toggle("dn")));
const render = async () => {
    const category = state.category;

    const data = await fetch("./json/sub02.json").then(data => data.json());
    //start
    (()=> {
    const filteredData = category == null ? data : data.filter(data => data.name == category);
    const reducedData = filteredData.reduce((acc, data) => {
        return [...acc, ...data.data];
    }, []);
    const html = reducedData.reduce((acc, data) => {
        const price = data.price.split(" ");
        return acc + htmlByData(data, price);
    }, '');



    document.querySelector("#allp").innerHTML = html;
    document.querySelectorAll("#allp > div").forEach(el => {
        if(state.buyList.includes(el.dataset.name)) el.classList.add("o5");
        el.addEventListener("dragend", (event)=> {
            if(checkInsideBuyArea(event))
                state.buyList.push(event.target.dataset.name);
            render();
        });
    });
    })();
    // end
    (()=> {
        const reducedData = data.reduce((acc, data) => {
            return [...acc, ...data.data];
        }, []);
        const filteredData = reducedData.filter(data => state.buyList.includes(data.name));
        const html = filteredData.reduce((acc, data, ) => {
            const price = data.price.split(" ");
            return acc + htmlByData(data, price, state.buyList.filter(buy => buy === data.name).length);
        }, '');
        $buyArea.innerHTML = html;
        document.querySelectorAll("#buy-area > div").forEach(el => {
            el.addEventListener("dragend", (event) => {
                if(!checkInsideBuyArea(event)) state.buyList = state.buyList.filter(data => !(data == event.target.dataset.name));
                render();
            });
            el.querySelectorAll("button").forEach(btn => btn.addEventListener("click", (e) => {
                if(e.target.dataset.event == "plus") 
                    state.buyList.push(el.dataset.name);
                else state.buyList.splice(state.buyList.findIndex(data=>data == el.dataset.name), 1);
                render();
            }))
        });
    })();
    //end

    (()=> {
        const reducedData = data.reduce((acc, data) => {
            return [...acc, ...data.data]                                     
        }, []);
        const filteredData = reducedData.filter(data => state.buyList.includes(data.name));
        const price = filteredData.reduce((acc, data) => {
            return acc + parseInt(data.price.replaceAll(",", "")) * (state.buyList.filter(buy => buy == data.name).length);
        }, 0);
        $price.innerHTML = price.toLocaleString() + "원";
    })();
}
const htmlByData = (data, price, count = null) => {
    return `
             <div class="df fc g10" style="width: 250px;" draggable='true' data-name="${data.name}">
                <div class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url('${data.img}');'); margin-bottom: 5px;"></div>
                    <div class="df fc g5">
                        <div>
                            <p class="f18 b s">${data.name}</p>
                            <p class="f12 cg s">${data.desc}</p>
                        </div>
                        <div>
                            <div class="df ac g5 price">
                                <p class="f18 origin">${price[0]}</p>
                                ${price[1] ? `<div class="f18 sale b">${price[1]}</div>` : ''}
                                ${price[1] ? `<div class="cw bm b5 f12 b" style="padding: 2px 10px">SALE</div>` : ''}
                            </div>
                            ${count == null ? '' :`
                                <div class="df g20">
                                <button data-event="minus" class="bw">-</button>
                                <div>${count}</div>
                                <button data-event="plus" class="bw">+</button>
                                </div>
                                `}
                        </div>
                    </div>
            </div>
        `;
}
const checkInsideBuyArea = (event) => {
    const x = event.clientX;
    const y = event.clientY;

    const rect = $buyArea.getBoundingClientRect();

    const isInside = (
        x >= rect.left &&
        x <= rect.right &&
        y >= rect.top &&
        y <= rect.bottom
    );
    return isInside;
}

// $buyArea


render();