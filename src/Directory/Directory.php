<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Directory;

use Skeleton\File\File;
use Skeleton\Path\Path;
use Skeleton\Text\Text;

interface Directory
{
    /** @return File[] */
    public function files(): array;

    public function path(): Path;

    /** Write contents of $source to this directory at the same relative path */
    public function put(File $source, Text $contents): void;

    /** Create a new file inside this directory with given relative path */
    public function create(string $relativePath): File;
}
