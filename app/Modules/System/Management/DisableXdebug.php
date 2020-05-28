<?php

namespace App\Modules\System\Management;

use App\Modules\System\Api\DisableXdebugInterface;
use Illuminate\Filesystem\Filesystem;

class DisableXdebug implements DisableXdebugInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(
        Filesystem $filesystem
    ) {
        $this->filesystem = $filesystem;
    }

    public function execute(string $phpConfPath)
    {
        $xdebugFilename = '333-xdebug.ini';
        $destination = $phpConfPath . '/' . $xdebugFilename;

        $this->filesystem->delete($destination);
    }
}
