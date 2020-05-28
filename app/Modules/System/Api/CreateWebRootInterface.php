<?php

namespace App\Modules\System\Api;

interface CreateWebRootInterface
{
    public function execute(
        string $serverName,
        string $path,
        string $phpSocket,
        string $nginxTemplate,
        string $nginxFilename
    );
}
