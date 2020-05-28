<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetRootConnectionNameInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use Illuminate\Support\Facades\DB;

class GrantPermission implements GrantPermissionInterface
{
    private $rootConnectionName;

    public function __construct(GetRootConnectionNameInterface $rootConnectionName)
    {
        $this->rootConnectionName = $rootConnectionName;
    }

    public function execute(string $dbname, string $username, string $permission = 'ALL', string $connection = 'localhost')
    {
        $rootConnectionName = $this->rootConnectionName->execute();
        DB::connection($rootConnectionName)->statement("GRANT $permission ON $dbname.* TO '$username'@'$connection';");
        DB::connection($rootConnectionName)->statement("FLUSH PRIVILEGES;");
    }
}
