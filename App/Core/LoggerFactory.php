<?php
namespace App\Core;


class LoggerFactory {
    public static function createLogger(string $type): Logger {
        return match(strtolower($type)) {
            'file' => new FileLogger(),
            default => throw new InvalidArgumentException("Unknown logger type: $type"),
        };
    }
}