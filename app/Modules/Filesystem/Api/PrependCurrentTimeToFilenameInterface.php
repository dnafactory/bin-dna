<?php

namespace App\Modules\Filesystem\Api;

use Illuminate\Filesystem\FilesystemAdapter;

interface PrependCurrentTimeToFilenameInterface
{
    public function execute(string $name):  string;
}
