<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\DropUserInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class DropUser implements DropUserInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(string $username, string $connection = 'localhost')
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        DB::connection($rootDatabaseName)->statement("DROP USER '$username'@'$connection';");
    }
}
