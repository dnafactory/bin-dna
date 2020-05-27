<?php

namespace App\Modules\Database\Management;

use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use Illuminate\Support\Facades\DB;

class CreateUser implements CreateUserInterface
{
    private $rootDatabaseName;

    public function __construct(GetRootDatabaseNameInterface $rootDatabaseName)
    {
        $this->rootDatabaseName = $rootDatabaseName;
    }

    public function execute(string $username, string $password, string $connection = 'localhost')
    {
        $rootDatabaseName = $this->rootDatabaseName->execute();
        DB::connection($rootDatabaseName)->statement("CREATE USER '$username'@'$connection' IDENTIFIED BY '$password';FLUSH PRIVILEGES;");
    }
}
