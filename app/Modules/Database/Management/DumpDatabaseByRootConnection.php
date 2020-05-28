<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\DumpDatabaseByConnectionInterface;
use App\Modules\Database\Api\DumpDatabaseByRootConnectionInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;

class DumpDatabaseByRootConnection implements DumpDatabaseByRootConnectionInterface
{
    /**
     * @var GetRootConnectionNameInterface
     */
    private $getRootConnectionName;

    /**
     * @var DumpDatabaseByConnectionInterface
     */
    private $dumpDatabaseByConnection;

    public function __construct(
        GetRootConnectionNameInterface $getRootConnectionName,
        DumpDatabaseByConnectionInterface $dumpDatabaseByConnection
    ) {
        $this->getRootConnectionName = $getRootConnectionName;
        $this->dumpDatabaseByConnection = $dumpDatabaseByConnection;
    }

    public function execute(
        string $dbname,
        string $filename,
        array $excludeTables = [],
        array $includeTables = [],
        bool $compress = false
    ) {
        $rootConnectionName = $this->getRootConnectionName->execute();

        $this->dumpDatabaseByConnection->execute(
            $rootConnectionName,
            $dbname,
            $filename,
            $excludeTables,
            $includeTables,
            $compress
        );
    }
}

