<?php 
final class App {
    private static ?PDO $pdo = null;

    public static function init(): void {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                'mysql:host=localhost;dbname=library-mvc;charset=utf8',
                'root',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }
    }

    public static function db(): PDO {
        if (self::$pdo === null) self::init();
        return self::$pdo;
    }
}
