<?php

namespace App\Modules\Me\Management;

use App\Modules\Me\Api\WhoAmIInterface;

class WhoAmI implements WhoAmIInterface
{
    public function execute()
    {
        $me = config('me');
        return sprintf("%s@%s", $me['name'], $me['ip']);
    }
}
