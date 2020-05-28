<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use Illuminate\Support\Facades\DB;

class GetAvailableConnections implements GetAvailableConnectionsInterface
{
    public function execute(): array
    {
        return config('database.connections');
    }
}
