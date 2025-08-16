<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Converts any path to an absolute normalized form.
 * - Resolves relative paths using getcwd().
 * - Normalizes slashes and removes redundant segments like '/./'.
 */
final readonly class AbsolutePath implements Path
{
    private Path $origin;

    public function __construct(Path $origin)
    {
        $this->origin = new TrimmedSlashPath(
            new DotSegmentsRemovedPath(
                new SingleSlashedPath(
                    new ForwardSlashedPath(
                        new PrependedCwdPath($origin)
                    )
                )
            )
        );
    }

    #[\Override]
    public function value(): string
    {
        return $this->origin->value();
    }
}
