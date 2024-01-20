<?php

declare(strict_types=1);

namespace App;

final readonly class Trigger
{
    public function __construct(int $severity)
    {
        try {
            \trigger_error('Hello', $severity);
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException(
                \sprintf('I have failed and the message was: %s', $e->getMessage()),
                previous: $e,
            );
        }
    }
}
