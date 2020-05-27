<?php

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use App\Modules\Database\Api\GetAvailableDatabasesInterface;
use App\Modules\Database\Api\GetAvailableUsersInterface;
use App\Modules\Database\Api\GetRootDatabaseNameInterface;
use App\Modules\Database\Management\GetAvailableConnections;
use App\Modules\Database\Management\GetAvailableDatabases;
use App\Modules\Database\Management\GetAvailableUsers;
use App\Modules\Database\Management\GetRootDatabaseName;

return [
    'bind' => [

    ],

    'singleton' => [
        GetRootDatabaseNameInterface::class => GetRootDatabaseName::class,
        GetAvailableConnectionsInterface::class => GetAvailableConnections::class,
        GetAvailableDatabasesInterface::class => GetAvailableDatabases::class,
        GetAvailableUsersInterface::class => GetAvailableUsers::class
    ]
];
