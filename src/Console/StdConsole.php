<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final readonly class StdConsole implements Console
{
    #[\Override]
    public function writeOutput(Text $text): void
    {
        fwrite(STDOUT, $text->value());
    }

    #[\Override]
    public function writeError(Text $text): void
    {
        fwrite(STDERR, $text->value());
    }

    #[\Override]
    public function readLine(): Text
    {
        /** @var string $line */
        $line = fgets(STDIN);

        return new TextOf(trim($line));
    }
}
