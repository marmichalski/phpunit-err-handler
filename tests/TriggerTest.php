<?php

declare(strict_types=1);

namespace App\Tests;

use App\Trigger;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;
use PHPUnit\Framework\TestCase;

final class TriggerTest extends TestCase
{
    #[Test]
    #[DataProvider('severities')]
    public function throws_on_construct_with_handler(int $severity): void
    {
        $this->expectExceptionObject(new \InvalidArgumentException('I have failed and the message was: Hello'));

        new Trigger($severity);
    }

    #[Test]
    #[DataProvider('severities')]
    #[WithoutErrorHandler]
    public function throws_on_construct_without_handler(int $severity): void
    {
        $this->expectExceptionObject(new \InvalidArgumentException('I have failed and the message was: Hello'));

        new Trigger($severity);
    }

    public static function severities(): iterable
    {
        yield from [
            [E_USER_ERROR],
            [E_USER_WARNING],
            [E_USER_NOTICE],
            [E_USER_DEPRECATED],
        ];
    }
}