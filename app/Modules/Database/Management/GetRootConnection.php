<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetConnectionInterface;
use App\Modules\Database\Api\GetRootConnectionInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;

class GetRootConnection implements GetRootConnectionInterface
{
    /**
     * @var GetConnectionInterface
     */
    private $getConnection;
    /**
     * @var GetRootConnectionNameInterface
     */
    private $getRootConnectionName;

    public function __construct(
        GetRootConnectionNameInterface $getRootConnectionName,
        GetConnectionInterface $getConnection
    ) {
        $this->getConnection = $getConnection;
        $this->getRootConnectionName = $getRootConnectionName;
    }

    public function execute(): array
    {
        $rootConnectionName = $this->getRootConnectionName->execute();
        return $this->getConnection->execute($rootConnectionName);
    }
}
