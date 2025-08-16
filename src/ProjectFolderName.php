<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

final readonly class ProjectFolderName implements Text
{
    #[\Override]
    public function value(): string
    {
        $projectPath = dirname(__DIR__, 3);

        return basename($projectPath);
    }
}
