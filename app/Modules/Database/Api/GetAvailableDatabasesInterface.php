<?php

namespace App\Modules\Database\Api;

interface GetAvailableDatabasesInterface
{
    public function execute(): array;
}
