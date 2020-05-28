<?php

namespace App\Modules\System\Api;

interface EnableXdebugInterface
{
    public function execute(string $phpConfPath);
}
