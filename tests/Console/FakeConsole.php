<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Console;

use Skeleton\Console\Console;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final class FakeConsole implements Console
{
    private array $outputs = [];
    public function __construct(private readonly string $input = '')
    {
    }

    public function writeOutput(Text $text): void
    {
        $this->outputs[] = ['out', $text->value()];
    }

    public function writeError(Text $text): void
    {
        $this->outputs[] = ['err', $text->value()];
    }

    public function readLine(): Text
    {
        return new TextOf($this->input);
    }

    public function outputs(): array
    {
        return $this->outputs;
    }

    public function lastOutput(): string
    {
        foreach (array_reverse($this->outputs) as [$type, $value]) {
            if ($type === 'out') {
                return $value;
            }
        }
        return '';
    }

    public function lastError(): string
    {
        foreach (array_reverse($this->outputs) as [$type, $value]) {
            if ($type === 'err') {
                return $value;
            }
        }
        return '';
    }
}
