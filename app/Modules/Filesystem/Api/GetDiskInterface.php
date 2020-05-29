<?php

namespace App\Modules\Filesystem\Api;

use Illuminate\Filesystem\FilesystemAdapter;

interface GetDiskInterface
{
    public function execute(string $name):  FilesystemAdapter;
}
