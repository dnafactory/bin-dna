<?php

use App\Modules\Database\Command\CreateDatabaseCommand;
use App\Modules\Database\Command\DropDatabaseCommand;
use App\Modules\Database\Command\DumpDatabaseCommand;
use App\Modules\Database\Command\ShowConnectionsCommand;
use App\Modules\Database\Command\ShowDatabasesCommand;
use App\Modules\Database\Command\ShowUsersCommand;
use App\Modules\Database\Command\DropUserCommand;

return [
    ShowConnectionsCommand::class,
    ShowDatabasesCommand::class,
    ShowUsersCommand::class,

    CreateDatabaseCommand::class,

    DropDatabaseCommand::class,
    DropUserCommand::class,

    DumpDatabaseCommand::class
];
