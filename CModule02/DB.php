<?php 
class DB {
    static function getDB () {
        return new PDO("mysql:host=localhost;dbname=cmodule2;charset=utf8mb4", "root", "", [19 => 5, 3 => 2]);
    }
    static function exec($q, $p = []) {
        $s = self::getDB()->prepare($q);
        $s->execute($p);
        return true;
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
}