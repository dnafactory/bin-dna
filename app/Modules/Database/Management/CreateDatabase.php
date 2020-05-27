<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class CreateDatabase implements CreateDatabaseInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(string $dbname)
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        DB::connection($rootDatabaseName)->statement("CREATE DATABASE $dbname");
    }
}
