<?php

namespace App\Modules\Database\Api;

interface DumpDatabaseInterface
{
    public function execute(
        string $dbname,
        string $username,
        string $password,
        string $filename,
        array $excludeTables = [],
        array $includeTables = [],
        bool $compress = false,
        string $host = '127.0.0.1'
    );
}
