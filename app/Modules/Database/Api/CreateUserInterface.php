<?php

namespace App\Modules\Database\Api;

interface CreateUserInterface
{
    public function execute(string $username, string $password, string $connection = 'localhost');
}
