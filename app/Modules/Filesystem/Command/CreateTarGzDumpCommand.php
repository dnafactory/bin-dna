<?php

namespace App\Modules\Filesystem\Command;

use App\Modules\Filesystem\Api\CompressFolderWithTarGzInterface;
use Illuminate\Console\Command;

class CreateTarGzDumpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fs:create:dump-tar-gz {source} {destination}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un dump tar.gz di una cartella';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param CompressFolderWithTarGzInterface $compressFolderWithTarGz
     * @return mixed
     */
    public function handle(
        CompressFolderWithTarGzInterface $compressFolderWithTarGz
    ) {
        $source = $this->input->getArgument('source');
        $destination = $this->input->getArgument('destination');

        $compressFolderWithTarGz->execute($source, $destination);
        return $this;
    }
}
