<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Func;

use SplFileInfo;

/**
 * @implements Pred<SplFileInfo>
 */
final readonly class IsRegularFile implements Pred
{
    #[\Override]
    public function test(mixed $input): bool
    {
        $path = $input->getRealPath();
        return $input->isFile() && $path !== false;
    }
}
