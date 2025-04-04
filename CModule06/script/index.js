const notices = () => {
    const $noticeList = document.querySelector("#noticeList");
    const $$btns = document.querySelectorAll("#noticeBtns button");
    const $noticePage = document.querySelector(".noticePage");
    const $container = $noticeList.querySelector(".container");
    const $minus = document.querySelector(".minus");
    const $plus = document.querySelector(".plus");
    const state = new Proxy({
        order: 1,
        type: '',
        totalPages: 0,
        page: 1
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            if(prop == "totalPages") return;
            render();
        }
    })
    $$btns.forEach(el => el.addEventListener("click", (e) => state[el.dataset.type] = el.dataset.value));
    $plus.addEventListener("click", () => state.page < state.totalPages ? state.page++ : '');
    $minus.addEventListener("click", () => state.page > 1 ? state.page-- : '');
    const render = async () => {
        let data = await fetch("./noticeCtrl.php?action=fetchAll").then(data => data.json());
        data = data.toSorted((a, b) => (new Date(b.date) - new Date(a.date)) * state.order);
        data = data.filter(data => state.type != '' ? data.type == state.type : true);
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data);
        }, '');
        state.totalPages = Math.ceil(data.length / 6);
        if(state.page > state.totalPages) state.page = state.totalPages;
        $container.innerHTML = html;

        $noticePage.innerHTML = `${state.page} / ${state.totalPages}`;
        $container.style.translate = `0 -${(state.page - 1) * 300}px`;
    }
    const getHtml = (data) => {
        return `
        <li class="df bx2 cp bw1 hd jsb ac" style="height: 50px; padding: 10px;">
            <div class="df ac g20">
                <p class="btn1 b10 f12 bs cm df jc" style="width: 60px;">${data.type}</p>
                <p>${data.text}</p>
            </div>
            <p class="cg b">${data.date}</p>
        </li>`;
    }
    render();
}
notices();