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