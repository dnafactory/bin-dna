<?php

namespace App\Modules\Database\Api;

interface GetAvailableConnectionsInterface
{
    public function execute(): array;
}
