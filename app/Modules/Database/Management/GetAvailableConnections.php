<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;

class GetAvailableConnections implements GetAvailableConnectionsInterface
{
    public function execute(): array
    {
        $connections = config('database.connections');
        return $connections;
    }
}
