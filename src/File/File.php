<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\File;

use Skeleton\Directory\Directory;
use Skeleton\Path\Path;
use Skeleton\Path\RelativePath;
use Skeleton\Text\Text;

interface File
{
    public function relativePathFor(Directory $base): RelativePath;

    public function path(): Path;

    public function contents(): Text;

    public function write(Text $contents): void;
}
