<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;

trait ThrowAsserts
{
    public function assertThrows(callable $fn, string $expected, string $message = ''): void
    {
        try {
            $fn();
        } catch (\Throwable $e) {
            Assert::assertInstanceOf($expected, $e, $message);
            return;
        }

        throw new AssertionFailedError(
            $message ?: "Expected exception of type $expected was not thrown"
        );
    }
}
