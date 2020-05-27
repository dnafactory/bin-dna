<?php

namespace App\Modules\Database\Api;

interface CreateDatabaseInterface
{
    public function execute(string $dbname);
}
