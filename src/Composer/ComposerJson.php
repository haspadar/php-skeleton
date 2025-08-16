<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Composer;

use JsonException;
use Skeleton\Text\ItemAt;
use Skeleton\Text\NotEmpty;
use Skeleton\Text\Split;
use Skeleton\Text\Text;

final readonly class ComposerJson
{
    public function __construct(private Text $json)
    {
    }

    public function description(): Text
    {
        return new JsonKeyText($this->json, 'description');
    }

    public function vendor(): Text
    {
        $name = new JsonKeyText($this->json, 'name');
        return new NotEmpty(
            new ItemAt(
                new Split($name, '/'),
                0
            )
        );
    }

    public function repo(): Text
    {
        $name = new JsonKeyText($this->json, 'name');
        return new NotEmpty(
            new ItemAt(
                new Split($name, '/'),
                1
            )
        );
    }

    /**
     * @throws JsonException
     */
    public function namespace(): Text
    {
        return new JsonFirstMapKey($this->json, 'autoload', 'psr-4');

    }
}
