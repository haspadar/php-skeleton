#!/usr/bin/env php
<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

use Skeleton\Arg\Argv;
use Skeleton\Arg\ArgWithDefault;
use Skeleton\Arg\ArgWithFallback;
use Skeleton\Composer\ComposerJson;
use Skeleton\Composer\FirstAvailableText;
use Skeleton\ConfirmationPrompt;
use Skeleton\Console\ErrorMessageText;
use Skeleton\Console\StdConsole;
use Skeleton\Description;
use Skeleton\Directory\DiskDirectory;
use Skeleton\Directory\ReplacedDirectory;
use Skeleton\Event\Events;
use Skeleton\Event\Reaction\PrintFileCopied;
use Skeleton\Event\Reaction\PrintFilePatched;
use Skeleton\File\DiskFile;
use Skeleton\HumanReadableName;
use Skeleton\NamespaceName;
use Skeleton\Path\AbsolutePath;
use Skeleton\Path\PathFrom;
use Skeleton\ProjectFolderName;
use Skeleton\ProjectFolderPath;
use Skeleton\Replacement\DescriptionReplacement;
use Skeleton\Replacement\NameReplacement;
use Skeleton\Replacement\NamespaceReplacement;
use Skeleton\Replacement\RepoReplacement;
use Skeleton\Replacement\VendorReplacement;
use Skeleton\RepoName;
use Skeleton\Rule\CopyAsIs;
use Skeleton\Rule\CopyBySections;
use Skeleton\Task\CopyDirectoryTask;
use Skeleton\Text\PascalCase;
use Skeleton\Text\StickyText;
use Skeleton\Text\TextOf;
use Skeleton\Text\TitleCase;
use Skeleton\VendorName;

$binPath = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file'];
$basePath = dirname($binPath, 3);
$autoload = $basePath . '/vendor/autoload.php';
if (!file_exists($autoload)) {
    fwrite(STDERR, "Autoload not found at $autoload\n");
    exit(1);
}

require_once $autoload;

require_once $autoload;

$input = new Argv($argv);
$composer = new ComposerJson(
    new StickyText(
        new DiskFile(
            new PathFrom($basePath . '/composer.json')
        )->contents()
    )
);
$sourceDir = new DiskDirectory(
    new AbsolutePath(
        new PathFrom(
            new ArgWithDefault(
                $input->named('source'),
                dirname(__DIR__) . '/skeleton'
            )->value()
        )
    )
);

$repo = new RepoName(
    new ArgWithFallback(
        $input->named('repo'),
        new FirstAvailableText(
            $composer->repo(),
            new ProjectFolderName()
        )
    )
);

$vendor = new VendorName(
    new ArgWithFallback(
        $input->named('vendor'),
        new FirstAvailableText(
            $composer->vendor(),
            new TextOf('haspadar')
        )
    )
);

$namespace = new NamespaceName(
    new ArgWithFallback(
        $input->named('namespace'),
        new FirstAvailableText(
            $composer->namespace(),
            new PascalCase($repo)
        )
    )
);
$name = new HumanReadableName(
    new ArgWithFallback(
        $input->named('name'),
        new TitleCase($repo)
    )
);

$description = new Description(
    new ArgWithFallback(
        $input->named('description'),
        new FirstAvailableText(
            $composer->description(),
            new TextOf('Under construction...')
        )
    )
);

$replacements = [
    new VendorReplacement($vendor),
    new RepoReplacement($repo),
    new NamespaceReplacement($namespace),
    new DescriptionReplacement($description),
    new NameReplacement($name),
];

$targetDir = new DiskDirectory(
    new AbsolutePath(
        new PathFrom(
            new ArgWithFallback(
                $input->named('target'),
                new ProjectFolderPath()
            )->value()
        )
    )
);
$console = new StdConsole();
$events = new Events()
    ->with(new PrintFilePatched($console))
    ->with(new PrintFileCopied($console));
try {
    $replacedDir = new ReplacedDirectory($sourceDir, $replacements);
    new ConfirmationPrompt([
        'Source' => new TextOf($replacedDir->path()->value()),
        'Target' => new TextOf($targetDir->path()->value()),
        'Vendor' => $vendor,
        'Repo' => $repo,
        'Namespace' => $namespace,
        'Name' => $name,
        'Description' => $description,
    ], $console)
        ->task(
            new CopyDirectoryTask(
                $replacedDir,
                $targetDir,
                $events,
                [
                    '*' => new CopyAsIs(),
                    'README.md' => new CopyBySections(),
                ]
            ),
        )
            ->perform();
} catch (Throwable $exception) {
    $console->writeError(
        new ErrorMessageText(
            new TextOf($exception->getMessage() . "\n\n" . $exception->getTraceAsString()),
        )
    );
    exit(1);
}
