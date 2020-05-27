<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class GetRootDatabaseName implements GetRootDatabaseNameInterface
{
    public function execute(): string
    {
        return 'root';
    }
}
