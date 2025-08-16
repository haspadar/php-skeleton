<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;

interface Console
{
    public function writeOutput(Text $text): void;

    public function writeError(Text $text): void;

    public function readLine(): Text;
}
