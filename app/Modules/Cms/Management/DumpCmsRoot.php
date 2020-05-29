<?php

namespace App\Modules\Cms\Management;

use App\Modules\Cms\Api\DumpCmsRootInterface;
use App\Modules\Cms\Api\GetCmsRootInterface;

use App\Modules\Database\Api\DumpDatabaseByConnectionInterface;
use App\Modules\Filesystem\Api\CompressFolderWithTarGzInterface;
use App\Modules\Filesystem\Api\GetDiskInterface;
use App\Modules\Filesystem\Api\PrependCurrentTimeToFilenameInterface;
use Illuminate\Support\Str;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Illuminate\Http\File;

class DumpCmsRoot implements DumpCmsRootInterface
{
    /**
     * @var array
     */
    private $cmsRoot;
    /**
     * @var TemporaryDirectory
     */
    private $temporaryDirectory;
    /**
     * @var string
     */
    private $dbFilename;
    /**
     * @var string
     */
    private $dbFullFilename;
    /**
     * @var GetCmsRootInterface
     */
    private $getCmsRoot;
    /**
     * @var DumpDatabaseByConnectionInterface
     */
    private $dumpDatabaseByConnection;
    /**
     * @var CompressFolderWithTarGzInterface
     */
    private $compressFolderWithTarGz;
    /**
     * @var PrependCurrentTimeToFilenameInterface
     */
    private $prependCurrentTimeToFilename;
    /**
     * @var GetDiskInterface
     */
    private $getDisk;

    public function __construct(
        GetCmsRootInterface $getCmsRoot,
        DumpDatabaseByConnectionInterface $dumpDatabaseByConnection,
        CompressFolderWithTarGzInterface $compressFolderWithTarGz,
        PrependCurrentTimeToFilenameInterface $prependCurrentTimeToFilename,
        GetDiskInterface $getDisk
    ) {
        $this->getCmsRoot = $getCmsRoot;
        $this->dumpDatabaseByConnection = $dumpDatabaseByConnection;
        $this->compressFolderWithTarGz = $compressFolderWithTarGz;
        $this->prependCurrentTimeToFilename = $prependCurrentTimeToFilename;
        $this->getDisk = $getDisk;
    }

    public function execute(string $name)
    {
        $this->cmsRoot = $this->getCmsRoot->execute($name);

        $this->createTemporaryDirectory();

        $this->dumpDatabase();
        $this->copyDatabaseToDisks();

        $this->dumpCms();
        $this->copyCmsToDisks();

        $this->cleanTemporaryDirectory();
    }

    private function dumpCms()
    {

    }

    private function copyCmsToDisks()
    {

    }

    private function copyDatabaseToDisks()
    {
        foreach ($this->cmsRoot['disks'] as $disk) {
            $filesystem = $this->getDisk->execute($disk);

            $filesystem->putFileAs('/', new File($this->dbFullFilename), $this->dbFilename);
        }
    }

    private function dumpDatabase()
    {
        $this->dbFilename = 'dump-db.sql.gz';
        $this->dbFilename = $this->prependCurrentTimeToFilename->execute($this->dbFilename);

        $this->dbFullFilename = $this->temporaryDirectory->path($this->dbFilename);

        $this->dumpDatabaseByConnection->execute(
            $this->cmsRoot['connection'],
            $this->dbFullFilename,
            true
        );
    }

    private function createTemporaryDirectory()
    {
        $this->temporaryDirectory = (new TemporaryDirectory($this->cmsRoot['tmp_directory']))
            ->name(Str::random())
            ->force()
            ->create()
            ->empty();
    }

    private function cleanTemporaryDirectory()
    {
        $this->temporaryDirectory->delete();
    }
}
