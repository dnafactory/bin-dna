<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class DropDatabase implements DropDatabaseInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(string $dbname)
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        DB::connection($rootDatabaseName)->statement("DROP DATABASE $dbname");
    }
}
