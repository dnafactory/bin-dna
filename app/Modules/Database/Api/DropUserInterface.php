<?php

namespace App\Modules\Database\Api;

interface DropUserInterface
{
    public function execute(string $username, string $connection = 'localhost');
}
