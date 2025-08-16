<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Replacement;

interface Replacement
{
    public function placeholder(): string;
    public function applyTo(string $text): string;
}
