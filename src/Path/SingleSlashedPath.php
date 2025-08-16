<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Collapses consecutive slashes into a single slash.
 * Example: '///a//b' → '/a/b'
 */
final readonly class SingleSlashedPath implements Path
{
    public function __construct(private Path $origin)
    {
    }

    /**
     * Collapse consecutive slashes into a single slash,
     * except for protocol prefixes like "http://" or "file://".
     */
    #[\Override]
    public function value(): string
    {
        return preg_replace('#(?<!:)//+#', '/', $this->origin->value()) ?: '';
    }
}
