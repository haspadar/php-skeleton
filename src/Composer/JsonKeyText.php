<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Composer;

use Skeleton\Exception;
use Skeleton\Text\Text;

final readonly class JsonKeyText implements Text
{
    public function __construct(
        private Text $json,
        private string $dotKey
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $data = json_decode($this->json->value(), true, 512, JSON_THROW_ON_ERROR);
        foreach (explode('.', $this->dotKey) as $segment) {
            if (!is_array($data) || !array_key_exists($segment, $data)) {
                throw new Exception("Missing key: $this->dotKey");
            }

            $data = $data[$segment];
        }

        /** @var string|int|float|bool $data */
        return (string) $data;
    }
}
