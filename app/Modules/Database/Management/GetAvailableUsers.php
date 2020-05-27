<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableUsersInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class GetAvailableUsers implements GetAvailableUsersInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(): array
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        $users = DB::connection($rootDatabaseName)->select("SELECT user, host FROM mysql.user");
        return json_decode(json_encode($users), true);
    }
}
