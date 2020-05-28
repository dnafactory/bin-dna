<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\GetAvailableUsersInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;

class GetAvailableUsers implements GetAvailableUsersInterface
{
    private $rootConnectionName;

    public function __construct(GetRootConnectionNameInterface $rootConnectionName)
    {
        $this->rootConnectionName = $rootConnectionName;
    }

    public function execute(): array
    {
        $rootConnectionName = $this->rootConnectionName->execute();
        $users = DB::connection($rootConnectionName)->select("SELECT user, host FROM mysql.user");
        return json_decode(json_encode($users), true);
    }
}
