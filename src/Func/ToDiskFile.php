<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Func;

use Skeleton\File\DiskFile;
use Skeleton\Path\Path;
use Skeleton\Path\PathFrom;
use Skeleton\Path\RelativePath;
use SplFileInfo;

/**
 * @implements Func<SplFileInfo,DiskFile>
 */
final readonly class ToDiskFile implements Func
{
    public function __construct(private Path $root)
    {
    }

    #[\Override]
    public function apply(mixed $input): DiskFile
    {
        $abs = new PathFrom($input->getRealPath());
        return new DiskFile($abs, new RelativePath($this->root, $abs));
    }
}
