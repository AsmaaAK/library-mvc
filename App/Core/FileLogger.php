<?php

namespace App\Core;

// Step 2: Implement concrete loggers
class FileLogger implements Logger {
    public function log(string $message): void {
        $file = __DIR__ . '/logs/app.log';
        $this->prepareFile($file);
        file_put_contents($file, date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
    }

    private function prepareFile(string $file): void {
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
        if (!file_exists($file)) {
            file_put_contents($file, "=== Log Started at " . date('Y-m-d H:i:s') . " ===" . PHP_EOL);
        }
    }
}
