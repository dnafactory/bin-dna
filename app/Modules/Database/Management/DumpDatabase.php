<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\DumpDatabaseInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;
use Spatie\DbDumper\Compressors\GzipCompressor;

class DumpDatabase implements DumpDatabaseInterface
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
    ) {
        $dumper = \Spatie\DbDumper\Databases\MySql::create();

        $dumper->setHost($host);
        $dumper->setDbName($dbname);
        $dumper->setUserName($username);
        $dumper->setPassword($password);

        if ($compress) {
            $dumper->useCompressor(new GzipCompressor());
        }

        if (!empty($excludeTables)) {
            $dumper->excludeTables($excludeTables);
        }

        if (!empty($includeTables)) {
            $dumper->includeTables($includeTables);
        }

        $dumper->dumpToFile($filename);
    }
}
