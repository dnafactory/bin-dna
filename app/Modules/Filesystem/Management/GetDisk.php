<?php

namespace App\Modules\Filesystem\Management;

use App\Modules\Filesystem\Api\GetDiskInterface;
use App\Modules\Filesystem\Exception\DiskNotFoundException;
use Illuminate\Filesystem\FilesystemAdapter;

class GetDisk implements GetDiskInterface
{
    /**
     * @var GetAvailableDisks
     */
    private $availableDisks;

    public function __construct(GetAvailableDisks $availableDisks)
    {
        $this->availableDisks = $availableDisks;
    }

    /**
     * @param string $name
     * @return FilesystemAdapter;
     * @throws DiskNotFoundException
     */
    public function execute(string $name): FilesystemAdapter
    {
        $availableDisks = $this->availableDisks->execute();

        if (!array_key_exists($name, $availableDisks)) {
            throw new DiskNotFoundException("Disk non trovato");
        }

        return $availableDisks[$name];
    }
}
