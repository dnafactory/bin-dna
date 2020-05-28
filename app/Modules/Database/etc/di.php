<?php

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\DropUserInterface;
use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetAvailableDatabasesInterface;
use App\Modules\Database\Api\GetAvailableUsersInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use App\Modules\Database\Management\CreateDatabase;
use App\Modules\Database\Management\CreateUser;
use App\Modules\Database\Management\DropDatabase;
use App\Modules\Database\Management\DropUser;
use App\Modules\Database\Management\GetAvailableConnections;
use App\Modules\Database\Management\GetAvailableDatabases;
use App\Modules\Database\Management\GetAvailableUsers;
use App\Modules\Database\Management\GetRootDatabaseName;
use App\Modules\Database\Management\GrantPermission;

return [
    'bind' => [

    ],

    'singleton' => [
        GetRootDatabaseNameInterface::class => GetRootDatabaseName::class,
        GetAvailableConnectionsInterface::class => GetAvailableConnections::class,
        GetAvailableDatabasesInterface::class => GetAvailableDatabases::class,
        GetAvailableUsersInterface::class => GetAvailableUsers::class,

        DropUserInterface::class => DropUser::class,
        DropDatabaseInterface::class => DropDatabase::class,

        CreateUserInterface::class => CreateUser::class,
        CreateDatabaseInterface::class => CreateDatabase::class,

        GrantPermissionInterface::class => GrantPermission::class
    ]
];
