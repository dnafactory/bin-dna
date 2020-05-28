<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\DropUserInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;

class DropUser implements DropUserInterface
{
    private $rootConnectionName;

    public function __construct(GetRootConnectionNameInterface $rootConnectionName)
    {
        $this->rootConnectionName = $rootConnectionName;
    }

    public function execute(string $username, string $connection = 'localhost')
    {
        $rootConnectionName = $this->rootConnectionName->execute();
        DB::connection($rootConnectionName)->statement("DROP USER '$username'@'$connection';");
    }
}
