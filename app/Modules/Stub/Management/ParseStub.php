<?php

namespace App\Modules\Stub\Management;

use App\Modules\Stub\Api\ParseStubInterface;

class ParseStub implements ParseStubInterface
{
    public function execute($filename, $params = []): string
    {
        $stub = base_path('stubs') . '/' . $filename;
        $content = file_get_contents($stub);

        foreach ($params as $param) {
            $content = str_replace($param['alias'], $param['value'], $content);
        }

        return $content;
    }
}
