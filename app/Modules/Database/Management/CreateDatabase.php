<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;

class CreateDatabase implements CreateDatabaseInterface
{
    private $rootConnectionName;

    public function __construct(GetRootConnectionNameInterface $rootConnectionName)
    {
        $this->rootConnectionName = $rootConnectionName;
    }

    public function execute(string $dbname)
    {
        $rootConnectionName = $this->rootConnectionName->execute();
        DB::connection($rootConnectionName)->statement("CREATE DATABASE $dbname");
    }
}
