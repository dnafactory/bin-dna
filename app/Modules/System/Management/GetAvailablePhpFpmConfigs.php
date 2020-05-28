<?php

namespace App\Modules\System\Management;

use App\Modules\System\Api\GetAvailablePhpFpmConfigsInterface;

class GetAvailablePhpFpmConfigs implements GetAvailablePhpFpmConfigsInterface
{
    public function execute(): array
    {
        $configs = config('system.php-fpm');
        return $configs;
    }
}
