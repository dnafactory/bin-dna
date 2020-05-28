<?php

namespace App\Modules\Stub\Management;

use App\Modules\Stub\Api\ParseStubInterface;
use Illuminate\Filesystem\Filesystem;

class ParseStub implements ParseStubInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function execute($filename, $params = []): string
    {
        $stub = base_path('stubs') . '/' . $filename;
        $content = $this->filesystem->get($stub);

        foreach ($params as $param) {
            $content = str_replace($param['alias'], $param['value'], $content);
        }

        return $content;
    }
}
