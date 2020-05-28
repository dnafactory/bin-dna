<?php

namespace App\Modules\Filesystem\Api;

interface CompressFolderWithTarGzInterface
{
    public function execute(string $source, string $destination, array $exclude = []);
}
