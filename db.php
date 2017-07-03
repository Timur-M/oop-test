<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'oop-test');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'oop_test');

class db {
    protected static $dbh;

    private function __construct() {
        self::$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
    }

    public static function set_instance() {
        if (self::$dbh === null) {
            new self;
        }
    }

    public static function select_all($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function select_all_to_objects($sql,$params=array(),$class_name) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS,$class_name);
    }

    public static function select_one($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public static function insert($sql,$params) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return self::$dbh->lastInsertId();
    }

    public static function update($sql,$params) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
    }
}