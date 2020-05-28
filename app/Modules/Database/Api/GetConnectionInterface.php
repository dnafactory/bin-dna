<?php

namespace App\Modules\Database\Api;

interface GetConnectionInterface
{
    public function execute(string $connectionName): array;
}
