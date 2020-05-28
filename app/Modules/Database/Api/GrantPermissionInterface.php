<?php

namespace App\Modules\Database\Api;

interface GrantPermissionInterface
{
    public function execute(string $dbname, string $username, string $permission = 'ALL', string $connection = 'localhost');
}
