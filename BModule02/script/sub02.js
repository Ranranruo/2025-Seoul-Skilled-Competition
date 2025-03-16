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
