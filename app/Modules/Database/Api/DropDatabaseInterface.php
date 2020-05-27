<?php

namespace App\Modules\Database\Api;

interface DropDatabaseInterface
{
    public function execute(string $dbname);
}
