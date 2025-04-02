const manageNotice = () => {
    const $noticeList = document.querySelector("#noticeList");
    const $left = document.querySelector("#left");
    const $right = document.querySelector("#right");
    const $count = document.querySelector("#count");
    const state = {
        page: 1,
        order: 1,
        type: ''
    }
    const render = async () => {
        let data = await fetch("./noticeCtrl.php?action=fetchAll").then(data => data.json());
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data);
        }, '');

        $noticeList.innerHTML = html;
    }
    const getHtml = (data) => {
        return `
        <form action="noticeCtrl.php" class="cp df ac jsb btn1 bw1 bx2 cp" style="height: 50px;" method="post">
            <input type="text" hidden name="idx" value="${data.idx}">
            <input type="text" hidden name="action" value="update">
            <div class="df g20 ac">
                <select class="b20 cm bs f12 btn1 df jc ac" name="type">
                    <option value="이벤트" ${data.type == "이벤트" ? 'selected' : ''}>이벤트</option>
                    <option value="일반" ${data.type == "일반" ? 'selected' : ''}>일반</option>
                </select>
                <input type="text" class="f16" style="width: 600px;" name="text" value="${data.text}">
            </div>
            <div class="df g30 ac">
                <p class="cg b">${data.date}</p>
                <div class="df g5"><button class="bw3 cb btn1 hd b5 b">Edit</button><a class="btn1 hd b5 bm cw1 f14 b" href="noticeCtrl.php?action=delete&idx=${data.idx}">Delete</a></div>
            </div>
        </form>
        `
    }
    render();
}
manageNotice();