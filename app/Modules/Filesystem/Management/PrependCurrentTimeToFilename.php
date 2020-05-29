<?php

namespace App\Modules\Filesystem\Management;

use App\Modules\Filesystem\Api\PrependCurrentTimeToFilenameInterface;
use Carbon\Carbon;

class PrependCurrentTimeToFilename implements PrependCurrentTimeToFilenameInterface
{
    public function execute(string $filename): string
    {
        $now = Carbon::now();
        return $now->format('Y-m-d-h-i') . '-' . $filename;
    }
}
