<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetConnectionInterface;
use App\Modules\Database\Exception\ConnectionNotFoundException;

class GetConnection implements GetConnectionInterface
{
    /**
     * @var GetAvailableConnectionsInterface
     */
    private $availableConnections;

    public function __construct(
        GetAvailableConnectionsInterface $availableConnections
    ) {
        $this->availableConnections = $availableConnections;
    }

    public function execute(string $connectionName): array
    {
        $connections = $this->availableConnections->execute();
        $foundConnection = null;

        foreach ($connections as $tmpConnectionName => $tmpConnection) {
            if ($tmpConnectionName == $connectionName) {
                $foundConnection = $tmpConnection;
            }
        }

        if ($foundConnection === null || !is_array($foundConnection)) {
            throw new ConnectionNotFoundException("Connessione non trovata");
        }

        return $foundConnection;
    }
}
