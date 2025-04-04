<?php
function script($q) {
    echo "<script>$q</script>";
}
function move($u, $m = null) {
    if(!$m) {
        script("location.href='$u'");
    }
    script("alert('$m'); location.href='$u'");

}
function back($m = null) {
    if(!$m) {
        script("history.back();");
    }
    script("alert('$m'); history.back();");
}

class DB {
    static function getDB() {
        return new PDO("mysql:host=localhost;dbname=demo;chartset=utf8mb4", "root", "", [19=>5, 3=>2]);
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