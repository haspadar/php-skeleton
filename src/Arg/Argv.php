<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Arg;

final readonly class Argv
{
    /** @var list<string> */
    private array $argv;

    /**
     * @param list<string> $argv
     */
    public function __construct(array $argv)
    {
        $this->argv = $argv;
    }

    public function named(string $name): Arg
    {
        foreach ($this->argv as $arg) {
            if (preg_match('/^--' . preg_quote($name, '/') . '=(.*)$/', $arg, $matches) === 1) {
                return new ArgProvided($name, $matches[1]);
            }
        }

        return new ArgMissing($name);
    }
}
