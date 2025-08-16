<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Text;

use Skeleton\Text\Text;

final class CountingText implements Text
{
    private int $count = 0;

    public function value(): string
    {
        $this->count++;
        return 'call-' . $this->count;
    }

    public function calls(): int
    {
        return $this->count;
    }
}
