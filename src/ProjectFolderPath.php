<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

final readonly class ProjectFolderPath implements Text
{
    #[\Override]
    public function value(): string
    {
        return getcwd();
    }
}
