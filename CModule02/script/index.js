const state = {
    noticeIndex: 0,
    noticeOrder: 'desc'
}

const $notices = document.querySelector(".notices");
const $$notice = $notices.querySelectorAll(".notice");

document.querySelectorAll(".notice-btn").forEach(btn => btn.addEventListener("click", (e) => {
    const noticeCount = document.querySelectorAll(".notice").length;
    if(e.target.dataset.event == "plus") { if (state.noticeIndex < (noticeCount / 2) /6 - 1) state.noticeIndex++; }
    else {if (state.noticeIndex > 0) state.noticeIndex--;}
    console.log(state.noticeIndex);

    render();
}));

document.querySelectorAll(".notices-order").forEach(btn => btn.addEventListener("click", (e) => {
    state.noticeOrder = e.target.dataset.order;
    render();
}));

const render = () => {
    $notices.setAttribute("style", `transform: translateY(${-300 * state.noticeIndex}px)`);
    $$notice.forEach(el => {
        if(el.classList.contains(state.noticeOrder)) el.style.display = "flex";
        else el.style.display = "none";
    })
    
}

render();