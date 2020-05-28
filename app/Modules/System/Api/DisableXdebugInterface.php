<?php

namespace App\Modules\System\Api;

interface DisableXdebugInterface
{
    public function execute(string $phpConfPath);
}
