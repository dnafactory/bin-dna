<?php

namespace App\Modules\Cms\Command;

use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class ShowCmsRootsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:show:roots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra la lista delle WebRoot installate';

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
     * @return mixed
     */
    public function handle(GetAvailableCmsRootsInterface $getAvailableCmsRoots)
    {
        $cmsRoots = $getAvailableCmsRoots->execute();

        $table = new Table($this->output);
        $table->setHeaders(['Alias', 'Nome', 'Path', "Connections", "Disks", "PHP Version"]);

        foreach ($cmsRoots as $cmsRootName => $cmsRoot) {
            $table->addRow([
                $cmsRootName,
                $cmsRoot['name'],
                $cmsRoot['path'],
                $cmsRoot['connection'],
                implode("\n", $cmsRoot['disks']),
                $cmsRoot['php_version'],
            ]);
        }

        $table->render();
        return $this;
    }
}
