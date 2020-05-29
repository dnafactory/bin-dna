<?php

use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;
use App\Modules\Cms\Management\GetAvailableCmsRoots;

return [
    'bind' => [

    ],

    'singleton' => [
        GetAvailableCmsRootsInterface::class => GetAvailableCmsRoots::class
    ]
];
