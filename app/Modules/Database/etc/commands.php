<?php

use App\Modules\Database\Command\CreateDatabaseCommand;
use App\Modules\Database\Command\ShowConnectionsCommand;
use App\Modules\Database\Command\ShowDatabasesCommand;
use App\Modules\Database\Command\ShowUsersCommand;

return [
    ShowConnectionsCommand::class,
    ShowDatabasesCommand::class,
    ShowUsersCommand::class,

    CreateDatabaseCommand::class
];
