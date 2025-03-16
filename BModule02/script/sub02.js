const $$btns = document.querySelectorAll("#ad button");
const $ad = document.querySelector("video");

const adEvents = {
    play: () => $ad.play(),
    pause: () => $ad.pause(),
    stop: () => { $ad.pause(); $ad.currentTime = 0},
    back: () => $ad.currentTime = $ad.currentTime <= 10 ? 0 : $ad.currentTime - 10,
    go: () => $ad.currentTime = $ad.currentTime + 10 > $ad.duration ? $ad.duration : $ad.currentTime + 10,
    slow: () => {},
    fast: () => {},
    clear: () => {},
    toggle: () => {},
    repeat: () => {},
    auto: () => {}
}

$$btns.forEach($btn => $btn.addEventListener("click", (event) => {
    const evnetName = event.target.dataset.event;
    console.log($ad.currentTime);
    adEvents[evnetName]();
}));
