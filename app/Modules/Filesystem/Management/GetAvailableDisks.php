<?php

namespace App\Modules\Filesystem\Management;

use App\Modules\Filesystem\Api\GetAvailableDisksInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;

class GetAvailableDisks implements GetAvailableDisksInterface
{
    /**
     * @return FilesystemAdapter[]
     */
    public function execute(): array
    {
        $availableDisks = [];

        $disks = config('filesystems.disks');
        foreach ($disks as $diskName => $disk) {
            $availableDisks[$diskName] = Storage::disk($diskName);
        }

        return $availableDisks;
    }
}
