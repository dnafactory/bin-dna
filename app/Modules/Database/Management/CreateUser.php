<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use Illuminate\Support\Facades\DB;

class CreateUser implements CreateUserInterface
{
    private $rootConnectionName;

    public function __construct(GetRootConnectionNameInterface $rootConnectionName)
    {
        $this->rootConnectionName = $rootConnectionName;
    }

    public function execute(string $username, string $password, string $connection = 'localhost')
    {
        $rootConnectionName = $this->rootConnectionName->execute();
        DB::connection($rootConnectionName)->statement("CREATE USER '$username'@'$connection' IDENTIFIED BY '$password';");
        DB::connection($rootConnectionName)->statement("FLUSH PRIVILEGES;");
    }
}
