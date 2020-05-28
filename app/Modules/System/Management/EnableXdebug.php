<?php

namespace App\Modules\System\Management;

use App\Modules\Stub\Api\ParseStubInterface;
use App\Modules\System\Api\EnableXdebugInterface;
use Illuminate\Filesystem\Filesystem;

class EnableXdebug implements EnableXdebugInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var ParseStubInterface
     */
    private $parseStub;

    public function __construct(
        Filesystem $filesystem,
        ParseStubInterface $parseStub
    ) {
        $this->filesystem = $filesystem;
        $this->parseStub = $parseStub;
    }

    public function execute(string $phpConfPath)
    {
        $xdebugTemplate = $this->parseStub->execute('php-fpm/xdebug.ini');

        $xdebugFilename = '333-xdebug.ini';
        $destination = $phpConfPath . '/' . $xdebugFilename;

        $this->filesystem->put($destination, $xdebugTemplate);
    }
}
