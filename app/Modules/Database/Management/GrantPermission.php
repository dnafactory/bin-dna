<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use Illuminate\Support\Facades\DB;

class GrantPermission implements GrantPermissionInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(string $dbname, string $username, string $permission = 'ALL', string $connection = 'localhost')
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        DB::connection($rootDatabaseName)->statement("GRANT $permission ON $dbname.* TO '$username'@'$connection';");
        DB::connection($rootDatabaseName)->statement("FLUSH PRIVILEGES;");
    }
}
