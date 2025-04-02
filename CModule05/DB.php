<?php
class DB {
    public static function getDB() {
        return new PDO("mysql:host=localhost;dbname=cmodule5;charset=utf8mb4", "root", "", [19 => 5, 3 => 2]);
    }
    public static function fetch($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return $s->fetch();
    }
    public static function fetchAll($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return $s->fetchAll();
    }
    public static function exec($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return true;
    }
}