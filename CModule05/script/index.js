const manageNotice = () => {
    const $noticeList = document.querySelector("#noticeList");
    const $left = document.querySelector("#left");
    const $right = document.querySelector("#right");
    const $count = document.querySelector("#count");
    const $$orderBtn = document.querySelectorAll(".orderBtn");
    const $$typeBtn = document.querySelectorAll(".typeBtn");
    
    const state = new Proxy({
        page: 1,
        order: 1,
        type: ''
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            return render();
        }
    });
    $$orderBtn.forEach(btn => btn.addEventListener("click", (e) => state.order = parseInt(e.target.dataset.type)));
    $$typeBtn.forEach(btn => btn.addEventListener("click", (e) => state.type = e.target.dataset.type));
    const render = async () => {
        let data = await fetch("./noticeCtrl.php?action=fetchAll").then(data => data.json());
        data = data.toSorted((a, b) => (new Date(b.date) - new Date(a.date)) * state.order);
        if(state.type != "") data = data.filter(data => data.type == state.type);
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data);
        }, '');

        $noticeList.innerHTML = html;
    }
    const setEvent = () => {

    }
    const getHtml = (data) => {
        return `
        <li action="noticeCtrl.php" class="cp df ac jsb btn1 bw1 bx2 cp" style="height: 50px;" method="post">
            <div class="df g20 ac">
                <p class="b20 cm bs f12 btn1 df jc ac" style="width: 60px">${data.type}</p>
                <p>${data.text}</p>
            </div>
            <div class="df g30 ac">
                <p class="cg b">${data.date}</p>
            </div>
        </li>
        `
    }
    render();
}
manageNotice();