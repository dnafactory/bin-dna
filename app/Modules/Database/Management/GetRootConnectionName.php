<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;

class GetRootConnectionName implements GetRootConnectionNameInterface
{
    public function execute(): string
    {
        return 'root';
    }
}
