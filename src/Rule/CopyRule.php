<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Rule;

use Skeleton\Event\Events;
use Skeleton\File\File;
use Skeleton\Task\Task;

interface CopyRule
{
    public function taskFor(File $source, File $target, Events $events): Task;

}
