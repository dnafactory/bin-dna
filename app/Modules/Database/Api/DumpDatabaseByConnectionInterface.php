<?php

namespace App\Modules\Database\Api;

interface DumpDatabaseByConnectionInterface
{
    public function execute(
        string $connectionName,
        string $filename,
        bool $compress = false,
        string $dbname = null
    );
}
