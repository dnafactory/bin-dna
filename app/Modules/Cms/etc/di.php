<?php

use App\Modules\Cms\Api\DumpCmsRootInterface;
use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;
use App\Modules\Cms\Api\GetCmsRootInterface;
use App\Modules\Cms\Management\DumpCmsRoot;
use App\Modules\Cms\Management\GetAvailableCmsRoots;
use App\Modules\Cms\Management\GetCmsRoot;

return [
    'bind' => [
        DumpCmsRootInterface::class => DumpCmsRoot::class
    ],

    'singleton' => [
        GetAvailableCmsRootsInterface::class => GetAvailableCmsRoots::class,
        GetCmsRootInterface::class => GetCmsRoot::class,
    ]
];
