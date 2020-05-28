<?php

namespace App\Modules\Database\Api;

interface DumpDatabaseByRootConnectionInterface
{
    public function execute(
        string $dbname,
        string $filename,
        array $excludeTables = [],
        array $includeTables = [],
        bool $compress = false
    );
}
