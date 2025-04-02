const 기능 = () => {
    const $container = document.querySelector(".container"); // html 주입할 컨테이너
    const state = new Proxy({
        property1: 'value1',
        property2: 'value2'
    }, {
        set(obj, prop, value) {
            obj[prop] = value;
            if(prop = "property1") return true; // 예외처리
            return render();
        }
    })
    // render 되지 않는 html 이벤트 등록
    document.querySelector(".eventButton").addEventListener("click", (e) => state.property2 = e.target.dataset.value);
    const render = async () => {
        let data = await fetch("some url").then(data => data.json()); // 데이터 fetch
        data = data.filter(data => data); // 필터링
        let html = data.reduce((acc, data) => {
            return acc + getHtml(data);
        });
        $container.innerHTML = html;
        setEvent();
    }
    // render한 html 이벤트 등록
    const setEvent = () => {
        $container.querySelector(".subButton1").addEventListener("click", (e) => state.property2 = e.target.dataset.value);
        $container.querySelector(".subButton2").addEventListener("click", (e) => state.property1 = e.target.dataset.value);
    }
    // html template
    const getHtml = (data) => {
        return `
        <div>${data.property1}</div>
        `
    }
    render();
}