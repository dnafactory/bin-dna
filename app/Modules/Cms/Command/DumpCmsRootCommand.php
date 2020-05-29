<?php

namespace App\Modules\Cms\Command;

use App\Modules\Cms\Api\DumpCmsRootInterface;
use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class DumpCmsRootCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:dump:root {rootname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Effettua un backup di una root CMS';

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
     * @param DumpCmsRootInterface $dumpCmsRoot
     * @return mixed
     */
    public function handle(DumpCmsRootInterface $dumpCmsRoot)
    {
        $rootName = $this->input->getArgument('rootname');
        $dumpCmsRoot->execute($rootName);
    }
}
