<?php

namespace App\Modules\Filesystem\Management;

use App\Modules\Filesystem\Api\CompressFolderWithTarGzInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CompressFolderWithTarGz implements CompressFolderWithTarGzInterface
{
    public function execute(string $source, string $destination, array $exclude = [])
    {
        $command = [
            'tar',
            '-czf',
            $destination,
            "-C",
            $source,
            "."
        ];

        foreach ($exclude as $item) {
            $command[] = "--exclude='{$item}'";
        }

        $process = new Process($command);
        $process->setTimeout(3600);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
