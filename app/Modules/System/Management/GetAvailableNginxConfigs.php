<?php

namespace App\Modules\System\Management;

use App\Modules\System\Api\GetAvailableNginxConfigsInterface;

class GetAvailableNginxConfigs implements GetAvailableNginxConfigsInterface
{
    public function execute(): array
    {
        $configs = config('system.nginx');
        return $configs;
    }
}
