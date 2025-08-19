<?php

namespace App\Core;

class NotificationCenter {
    private static ?NotificationCenter $instance = null;

    private function __construct() {
        echo "NotificationCenter initialized!\n";
    }

    private function __clone() {}

    // ✅ لازم تكون public عشان PHP ما يطلع warning
    public function __wakeup() {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): NotificationCenter {
        if (self::$instance === null) {
            self::$instance = new NotificationCenter();
        }
        return self::$instance;
    }

    public function send($user, $message) {
        echo "Sending notification to $user: $message\n";
    }
}
