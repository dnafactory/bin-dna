<?php

use App\Modules\Filesystem\Api\CompressFolderWithTarGzInterface;
use App\Modules\Filesystem\Api\GetAvailableDisksInterface;
use App\Modules\Filesystem\Api\GetDiskInterface;
use App\Modules\Filesystem\Api\PrependCurrentTimeToFilenameInterface;
use App\Modules\Filesystem\Management\CompressFolderWithTarGz;
use App\Modules\Filesystem\Management\GetAvailableDisks;
use App\Modules\Filesystem\Management\GetDisk;
use App\Modules\Filesystem\Management\PrependCurrentTimeToFilename;

return [
    'bind' => [

    ],

    'singleton' => [
        PrependCurrentTimeToFilenameInterface::class => PrependCurrentTimeToFilename::class,
        CompressFolderWithTarGzInterface::class => CompressFolderWithTarGz::class,
        GetAvailableDisksInterface::class => GetAvailableDisks::class,
        GetDiskInterface::class => GetDisk::class
    ]
];
