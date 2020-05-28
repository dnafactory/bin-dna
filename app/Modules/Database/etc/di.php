<?php

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\DropUserInterface;
use App\Modules\Database\Api\DumpDatabaseByConnectionInterface;
use App\Modules\Database\Api\DumpDatabaseByRootConnectionInterface;
use App\Modules\Database\Api\DumpDatabaseInterface;
use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetAvailableDatabasesInterface;
use App\Modules\Database\Api\GetAvailableUsersInterface;
use App\Modules\Database\Api\GetConnectionInterface;
use App\Modules\Database\Api\GetRootConnectionInterface;
use App\Modules\Database\Api\GetRootConnectionNameInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use App\Modules\Database\Management\CreateDatabase;
use App\Modules\Database\Management\CreateUser;
use App\Modules\Database\Management\DropDatabase;
use App\Modules\Database\Management\DropUser;
use App\Modules\Database\Management\DumpDatabase;
use App\Modules\Database\Management\DumpDatabaseByConnection;
use App\Modules\Database\Management\DumpDatabaseByRootConnection;
use App\Modules\Database\Management\GetAvailableConnections;
use App\Modules\Database\Management\GetAvailableDatabases;
use App\Modules\Database\Management\GetAvailableUsers;
use App\Modules\Database\Management\GetConnection;
use App\Modules\Database\Management\GetRootConnection;
use App\Modules\Database\Management\GetRootConnectionName;
use App\Modules\Database\Management\GrantPermission;

return [
    'bind' => [

    ],

    'singleton' => [
        GetRootConnectionInterface::class => GetRootConnection::class,
        GetRootConnectionNameInterface::class => GetRootConnectionName::class,
        GetAvailableConnectionsInterface::class => GetAvailableConnections::class,
        GetConnectionInterface::class => GetConnection::class,
        GetAvailableDatabasesInterface::class => GetAvailableDatabases::class,
        GetAvailableUsersInterface::class => GetAvailableUsers::class,

        DropUserInterface::class => DropUser::class,
        DropDatabaseInterface::class => DropDatabase::class,

        CreateUserInterface::class => CreateUser::class,
        CreateDatabaseInterface::class => CreateDatabase::class,

        GrantPermissionInterface::class => GrantPermission::class,

        DumpDatabaseInterface::class => DumpDatabase::class,
        DumpDatabaseByConnectionInterface::class => DumpDatabaseByConnection::class,
        DumpDatabaseByRootConnectionInterface::class => DumpDatabaseByRootConnection::class
    ]
];
