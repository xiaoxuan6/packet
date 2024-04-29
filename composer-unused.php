<?php

declare(strict_types=1);

/*
 * This file is part of james.xue/packet.
 *
 * (c) xiaoxuan6 <1527736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 */

use Webmozart\Glob\Glob;
use ComposerUnused\ComposerUnused\Configuration\{Configuration, NamedFilter};

return static function (Configuration $config): Configuration {
    $config
        ->addNamedFilter(NamedFilter::fromString('php'))
        ->addNamedFilter(NamedFilter::fromString('webmozart/assert'))
        ->addNamedFilter(NamedFilter::fromString('illuminate/collections'))
        ->addNamedFilter(NamedFilter::fromString('symfony/finder'))
        ->setAdditionalFilesFor('icanhazstring/composer-unused', [
            __FILE__,
            ...Glob::glob(__DIR__ . '/config/*.php'),
        ]);

    return $config;
};
