<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Arg;

use Skeleton\Text\Text;

interface Arg extends Text
{
    public function name(): string;
    #[\Override]
    public function value(): string;
    public function description(): string;

    public function hasValue(): bool;
}
