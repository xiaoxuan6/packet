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

use Webmozart\Assert\Assert;
use Illuminate\Support\Collection;
use Symfony\Component\Finder\Finder;

class PacketConfig
{
    public array $packetConfig;

    public function findPacket(): string
    {
        $finder = Finder::create()
            ->files()
            ->in(getcwd())
            ->name('*.php')
            ->notPath('vendor')
            ->filter(fn (SplFileInfo $fileInfo) => $fileInfo->getFilename() == 'packet.php');

        if ($finder->count() == 0) {
            $filepath = __DIR__ . DIRECTORY_SEPARATOR . 'packet.php';
        } else {
            $filepath = '';
            foreach ($finder as $file) {
                $filepath = $file->getRealPath();

                break;
            }
        }

        Assert::notEmpty($filepath, 'not found [packet.php] file.');

        return $filepath;
    }

    public function packetJson(): Collection
    {
        if (empty($this->packetConfig)) {
            $this->packetConfig = require_once $this->findPacket();
        }

        return collect($this->packetConfig);
    }

    public function phpCsFixer(): Collection
    {
        return collect($this->packetJson()->get('php-cs-fixer'));
    }

    public function getHeader(): string
    {
        return $this->phpCsFixer()->get('header');
    }

    public function getFixerPath(): array
    {
        return $this->phpCsFixer()->get('in');
    }

    public function getNotPath(): array
    {
        return $this->phpCsFixer()->get('not-path');
    }

    public function getFixerExclude(): array
    {
        return $this->phpCsFixer()->get('exclude');
    }

    public function getFixerName(): array
    {
        return $this->phpCsFixer()->get('name');
    }

    public function getNotName(): array
    {
        return $this->phpCsFixer()->get('not-name');
    }

    public function getRules(): array
    {
        return $this->phpCsFixer()->get('rules');
    }

    public function rector(): Collection
    {
        return collect($this->packetJson()->get('rector'));
    }

    public function getRectorPath(): array
    {
        return $this->rector()->get('path');
    }

    public function getSets(): array
    {
        return $this->rector()->get('sets');
    }

    public function getCall(): callable
    {
        return $this->rector()->get('callable');
    }
}
