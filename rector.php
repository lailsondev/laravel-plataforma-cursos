<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\Closure\AddClosureVoidReturnTypeWhereNoReturnRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/public',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])->withSkip([
        AddClosureVoidReturnTypeWhereNoReturnRector::class,
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php85: true)
    ->withPreparedSets(
        deadCode: true,
        typeDeclarations: true,
        earlyReturn: true);
