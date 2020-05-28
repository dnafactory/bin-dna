<?php

namespace App\Modules\Stub\Api;

interface ParseStubInterface
{
    public function execute($filename, $params = []): string;
}
