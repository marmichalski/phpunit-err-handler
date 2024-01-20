<?php

declare(strict_types=1);

\error_reporting(\E_ALL);

\set_error_handler(
    static function ($severity, $message, $file, $line): void {
        if ($severity & \error_reporting()) {
            throw new ErrorException($message, 0, $severity, $file, $line);
        }
    },
);

require_once __DIR__.'/vendor/autoload.php';
