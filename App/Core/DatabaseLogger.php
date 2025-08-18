<?php

namespace App\Core;

class DatabaseLogger implements Logger {
    public function log(string $message): void {

        $file = __DIR__ . '/logs/db.log';
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
        file_put_contents($file, "[DB] " . date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
    }
}