<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\DumpDatabaseByConnectionInterface;
use App\Modules\Database\Api\DumpDatabaseInterface;
use App\Modules\Database\Api\GetConnectionInterface;

class DumpDatabaseByConnection implements DumpDatabaseByConnectionInterface
{
    /**
     * @var DumpDatabaseInterface
     */
    private $dumpDatabase;
    /**
     * @var GetConnectionInterface
     */
    private $getConnection;

    public function __construct(
        GetConnectionInterface $getConnection,
        DumpDatabaseInterface $dumpDatabase
    ) {
        $this->getConnection = $getConnection;
        $this->dumpDatabase = $dumpDatabase;
    }

    public function execute(
        string $connectionName,
        string $dbname,
        string $filename,
        array $excludeTables = [],
        array $includeTables = [],
        bool $compress = false
    ) {
        $connection = $this->getConnection->execute($connectionName);

        $this->dumpDatabase->execute(
            $dbname,
            $connection['username'],
            $connection['password'],
            $filename,
            $excludeTables,
            $includeTables,
            $compress,
            $connection['host']
        );
    }
}

