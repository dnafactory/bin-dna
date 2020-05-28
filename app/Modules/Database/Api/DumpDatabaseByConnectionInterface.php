<?php

namespace App\Modules\Database\Api;

interface DumpDatabaseByConnectionInterface
{
    public function execute(
        string $connectionName,
        string $dbname,
        string $filename,
        array $excludeTables = [],
        array $includeTables = [],
        bool $compress = false
    );
}
