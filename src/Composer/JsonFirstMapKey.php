<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Composer;

use Skeleton\Exception;
use Skeleton\Text\NotEmpty;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

/**
 * Returns the first key of a nested JSON map.
 *
 * Example:
 *   $json = new TextOf('{"autoload": {"psr-4": {"App\\": "src/"}}}');
 *   new JsonFirstMapKey($json, 'autoload', 'psr-4')->value();
 *   // "App"
 *
 * Throws:
 *   - Exception if the path is missing or points to a list.
 *   - Exception if the map is empty or the key is empty.
 */
final readonly class JsonFirstMapKey implements Text
{
    /** @var string[] */
    private array $path;

    public function __construct(private Text $json, string ...$path)
    {
        $this->path = $path;
    }

    /**
     * @throws \JsonException
     */
    #[\Override]
    public function value(): string
    {
        $where = implode('.', $this->path);

        $data = json_decode($this->json->value(), true, 512, JSON_THROW_ON_ERROR);

        foreach ($this->path as $segment) {
            if (!is_array($data) || array_is_list($data) || !array_key_exists($segment, $data)) {
                throw new Exception('Missing or invalid JSON map at: ' . $where);
            }
            $data = $data[$segment];
        }

        if (!is_array($data) || array_is_list($data) || $data === []) {
            throw new Exception('Invalid JSON map at: ' . $where);
        }

        $key = (string)array_key_first($data);
        return new NotEmpty(
            new TextOf(rtrim($key, '\\')),
            'Empty key at: ' . $where
        )->value();
    }
}
