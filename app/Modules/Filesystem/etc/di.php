<?php

use App\Modules\Filesystem\Api\CompressFolderWithTarGzInterface;
use App\Modules\Filesystem\Management\CompressFolderWithTarGz;

return [
    'bind' => [

    ],

    'singleton' => [
        CompressFolderWithTarGzInterface::class => CompressFolderWithTarGz::class
    ]
];
