<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetAvailableDatabasesInterface;
use Illuminate\Support\Facades\DB;

class GetAvailableDatabases implements GetAvailableDatabasesInterface
{
    /**
     * @var GetAvailableConnectionsInterface
     */
    private $availableConnections;

    public function __construct(GetAvailableConnectionsInterface $availableConnections)
    {
        $this->availableConnections = $availableConnections;
    }

    public function execute(): array
    {
        $databases = [];

        foreach ($this->availableConnections->execute() as $connectionName => $connection) {
            try {
                $tmp = DB::connection($connectionName)->select("select schema_name from information_schema.schemata");
                foreach ($tmp as $item) {
                    $databases[$connectionName][] = $item->schema_name;
                }
            } catch (\Exception $e) {
                $databases[$connectionName][] = 'Impossibile connettersi';
            }
        }

        return $databases;
    }
}
