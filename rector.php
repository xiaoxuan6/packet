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

use Rector\Config\RectorConfig;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
spl_autoload_register(fn () => require_once __DIR__ . DIRECTORY_SEPARATOR . 'PacketConfig.php');

$packet = new PacketConfig();

return static function (RectorConfig $rectorConfig) use ($packet) {
    $rectorConfig->paths($packet->getRectorPath());

    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);
    $rectorConfig->removeUnusedImports();

    $rectorConfig->sets($packet->getSets());
};
