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

const state = {
    category: null,
    buyList: [

    ]
};

const render = async () => {
    const category = state.category;

    const data = await fetch("./json/sub02.json").then(data => data.json());
    const filteredData = category == null ? data : data.filter(data => data.name == category);
    const reducedData = filteredData.reduce((acc, data) => {
        return [...acc, ...data.data];
    }, []);
    const html = reducedData.reduce((acc, data, idx) => {
        const price = data.price.split(" ");
        return acc +`
             <div class="df fc g10" style="width: 250px;">
                <img src='./images/image${idx >= 2 ? idx + 2 : idx + 1 }.png');' class="bi b5 df fc" style="width: 250px; aspect-ratio: 1/1; background-image: url(' margin-bottom: 5px;">
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
                        </div>
                    </div>
            </div>
        `;
    }, '');
    document.querySelector("#allp").innerHTML = html;
    document.querySelectorAll("#allp > div").forEach(el => el.addEventListener("mousedown", ()=> {
        console.log("a");
    }))
}


render();