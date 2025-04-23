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


```
// php uill
<?php
class R {
    static $r = [];
    static function on($m, $u, $f) {
        $uri = preg_replace("#\{(.*?)\}#", "([^\/]+)", $u);
        self::$r[] = [$m, "#^$uri$#", $f];
    }
    static function run() {
        $reqM = $_SERVER['REQUEST_METHOD'];
        $reqU = $_SERVER['REQUEST_URI'];
        foreach(self::$r as [$m, $u, $f]) {
            if($m != $reqM) continue;
            if(preg_match($u, $reqU, $mat)) {
                array_shift($mat);
                call_user_func_array($f, $mat);
                return;
            }
        }
    }
}

function GET($u, $f) { R::on("GET", $u, $f); }
function POST($u, $f) { R::on("POST", $u, $f); }
function PUT($u, $f) { R::on("PUT", $u, $f); }
function DELETE($u, $f) { R::on("DELETE", $u, $f); }

<?php
class DB {
    static function getDB() {
        return new PDO("mysql:host=localhost;dbname=test;chartset=utf8mb4", "root", "", [19=>5, 3=>2]);
    }
    static function fetch($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return $s->fetch();
    }
    static function fetchAll($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return $s->fetchAll();
    }
    static function exec($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return true;
    }
}

//engine
RewriteEngine On
RewriteRule . index.php$1 [L]
```

