<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

final readonly class RepoName implements Text
{
    public function __construct(private Text $origin)
    {
    }

    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        $value = strtolower($this->origin->value());
        if (!preg_match('/^[a-z0-9\-_]+$/', $value)) {
            throw new Exception("Invalid repository name: '$value'. Only lowercase letters, digits, hyphens (-) and underscores (_) are allowed.");
        }

        return $value;
    }
}
