<?php

namespace App\Modules\System\Management;

use App\Modules\Stub\Api\ParseStubInterface;
use App\Modules\System\Api\CreateWebRootInterface;
use Illuminate\Filesystem\Filesystem;

class CreateWebRoot implements CreateWebRootInterface
{
    /**
     * @var ParseStubInterface
     */
    private $parseStub;
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(
        Filesystem $filesystem,
        ParseStubInterface $parseStub
    ) {
        $this->parseStub = $parseStub;
        $this->filesystem = $filesystem;
    }

    public function execute(
        string $serverName,
        string $path,
        string $phpSocket,
        string $nginxTemplate,
        string $nginxFilename
    ) {
        $nginxTemplateOptions = [
            ['alias' => '{{SERVER_NAME}}', 'value' => $serverName],
            ['alias' => '{{SERVER_PATH}}', 'value' => $path],
            ['alias' => '{{FASTCGI_PASS}}', 'value' => $phpSocket]
        ];

        $nginxStub = $this->parseStub->execute($nginxTemplate, $nginxTemplateOptions);

        $nginxAvailableFilename = '/etc/nginx/sites-available/'.$nginxFilename;
        $nginxEnabledFilename = '/etc/nginx/sites-enabled/'.$nginxFilename;

        $this->filesystem->put($nginxAvailableFilename, $nginxStub);
        $this->filesystem->link($nginxAvailableFilename, $nginxEnabledFilename);
    }
}
