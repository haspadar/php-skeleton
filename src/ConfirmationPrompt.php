<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Console\Console;
use Skeleton\Console\CyanText;
use Skeleton\Console\LabeledTextLine;
use Skeleton\Console\YellowText;
use Skeleton\Task\AbortedTask;
use Skeleton\Task\Task;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final readonly class ConfirmationPrompt
{
    /**
     * @param array<string, Text> $items
     */
    public function __construct(private array $items, private Console $console)
    {
    }

    public function task(Task $task): Task
    {
        $this->console->writeOutput(
            new YellowText(
                new TextOf("\nFiles will be copied and the following values will be used for replacements:\n\n")
            )
        );

        foreach ($this->items as $label => $value) {
            $this->console->writeOutput(new LabeledTextLine($label, $value));
            $this->console->writeOutput(new TextOf("\n"));
        }

        $this->console->writeOutput(
            new CyanText(
                new TextOf("\nProceed with these values? (Y/n): ")
            )
        );
        $answer = strtolower(trim($this->console->readLine()->value()));
        $proceed = in_array($answer, ['', 'y', 'yes'], true);

        return $proceed ? $task : new AbortedTask($this->console);
    }
}
