<?php

/*
 * This file is part of james.xue/packet.
 *
 * (c) xiaoxuan6 <1527736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 */

$possibleFiles = [
    __DIR__ . '/../../../autoload.php',
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../autoload.php',
    __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php'
];

foreach ($possibleFiles as $possibleFile) {
    if (file_exists($possibleFile)) {
        require_once $possibleFile;

        break;
    }
}
