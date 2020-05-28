<?php

use App\Modules\Stub\Api\ParseStubInterface;
use App\Modules\Stub\Management\ParseStub;

return [
    'bind' => [

    ],

    'singleton' => [
        ParseStubInterface::class => ParseStub::class
    ]
];
