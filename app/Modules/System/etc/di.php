<?php

use App\Modules\System\Api\CreateWebRootInterface;
use App\Modules\System\Api\GetAvailableNginxConfigsInterface;
use App\Modules\System\Api\GetAvailablePhpFpmConfigsInterface;
use App\Modules\System\Management\CreateWebRoot;
use App\Modules\System\Management\GetAvailableNginxConfigs;
use App\Modules\System\Management\GetAvailablePhpFpmConfigs;

return [
    'bind' => [

    ],

    'singleton' => [
        GetAvailablePhpFpmConfigsInterface::class => GetAvailablePhpFpmConfigs::class,
        GetAvailableNginxConfigsInterface::class => GetAvailableNginxConfigs::class,
        CreateWebRootInterface::class => CreateWebRoot::class,
    ]
];
