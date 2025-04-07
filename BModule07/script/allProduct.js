// 광고
const ad = () => {
    const $video = document.querySelector("video");
    const $$btn = document.querySelectorAll("#moto button");
    const $duration = document.querySelector("#moto .duration");
    const $time = document.querySelector("#moto .time");
    if(document.cookie == "auto") $video.toggleAttribute("autoplay");
    const events = {
        play: () => $video.play(),
        pause: () => $video.pause(),
        stop: () => {$video.currentTime = 0; $video.pause();},
        back: () => $video.currentTime -= 10,
        go: () => $video.currentTime += 10,
        slow: () => $video.playbackRate -= 0.1,
        fast: () => $video.playbackRate += 0.1,
        clear: () => $video.playbackRate = 1,
        control: () => {
            $$btn.forEach(btn => {
                if(btn.dataset.event != "control") btn.toggleAttribute("hidden");
            })
        },
        repeat: () => $video.toggleAttribute("loop"),
        auto: () => {
            document.cookie = document.cookie == "auto" ? "no" : "auto";
        }

    }
    setInterval(()=> {
        $time.innerHTML = `현재 시간: ${Math.round($video.currentTime)}s`;
        $duration.innerHTML = `현재 배속: ${Math.round($video.playbackRate * 10) / 10}x`;
    }, 10)
    $$btn.forEach(btn => btn.addEventListener("click", (e) => {
        events[btn.dataset.event]();
    }));
    const render = () => {

    }
    render();
}
ad();