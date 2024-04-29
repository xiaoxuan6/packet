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

use Rector\Set\ValueObject\{LevelSetList, SetList};

return [
    'php-cs-fixer' => [
        'in' => [
            __DIR__,
            __DIR__ . DIRECTORY_SEPARATOR . 'bin',
        ],

        'exclude' => [
            __DIR__ . '/vendor',
        ],

        'name' => [
            '*.php',
            'packet'
        ]
    ],

    'rector' => [
        'path' => [
            __DIR__ . DIRECTORY_SEPARATOR . 'bin',
        ],

        'sets' => [
            LevelSetList::UP_TO_PHP_80,
            SetList::INSTANCEOF,
            SetList::TYPE_DECLARATION,
            SetList::EARLY_RETURN,
            SetList::PHP_80,
        ]
    ]
];
