AModule5
    Total - 3h;


BModule5
    Moto - 약 35m;
    AD - 약 15m;
    비회원 주문 - 약 1h 20m;
    Total - 2h10m;

```
// javascript default format
const funcName = () => {
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
    });
    // render 되지 않는 html 이벤트 등록
    document.querySelector(".eventButton").addEventListener("click", (e) => state.property2 = e.target.dataset.value);
    const render = async () => {
        let data = await fetch("some url").then(data => data.json()); // 데이터 fetch
        data = data.filter(data => data); // 필터링
        data = data.toSorted(data => data); // 정렬
        let html = data.reduce((acc, data) => { // html화
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
    render(); // first rendering
}
funcName(); // start
```

```
// php default format
<?php
require_once "./DB.php";
require_once ".lib.php"
extract($_GET);
if($action == 'fetch') { // action
    $d = DB::fetch("SELECT * FROM Table WHERE id = ?", [$id]);
    echo json_encode($d);
}
if($action == 'fetchAll') {
    $d = DB::fetch("SELECT * FROM Table");
    echo json_encode($d);
}
if($action == 'insert') {
    $d = DB::exec("INSERT INTO Table (id, name, description) VALUES (?, ?, ?)", [$id, $name, $description]);
    msg("complte");
    back();
}
if($action == 'update') {
    $d = DB::exec("UPDATE Table SET name = ? WHERE id = ?", [$name, $id]);
    msg("complte");
    back();
}
if($action == 'delete') {
    $d = DB::exec("DELETE FROM Table WHERE idx = ?", [$idx]);
    msg("complte");
    back();
}
?>
```
a
