<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

use Override;
use Skeleton\Directory\Directory;
use Skeleton\Each;
use Skeleton\Event\Events;
use Skeleton\File\File;
use Skeleton\Rule\CopyAsIs;
use Skeleton\Rule\CopyRule;

final readonly class CopyDirectoryTask implements Task
{
    /**
     * @param array<string, CopyRule> $rules
     */
    public function __construct(
        private Directory $sourceDir,
        private Directory $targetDir,
        private Events $events,
        private array $rules = [],
    ) {
    }

    #[Override]
    public function perform(): void
    {
        $defaultRule = array_key_exists('*', $this->rules) ? $this->rules['*'] : new CopyAsIs();

        new Each(
            $this->sourceDir->files(),
            function (File $sourceFile) use ($defaultRule): void {
                $relativePath = $sourceFile->relativePathFor($this->sourceDir)->value();
                $ruleForFile = array_key_exists($relativePath, $this->rules)
                    ? $this->rules[$relativePath]
                    : $defaultRule;
                $targetFile = $this->targetDir->create($relativePath);
                $ruleForFile
                    ->taskFor($sourceFile, $targetFile, $this->events)
                    ->perform();
            },
        )->perform();
    }
}
