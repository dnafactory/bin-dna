<?php

use App\Modules\Me\Api\WhoAmIInterface;
use App\Modules\Me\Management\WhoAmI;

return [
    'bind' => [

    ],

    'singleton' => [
        WhoAmIInterface::class => WhoAmI::class
    ]
];
