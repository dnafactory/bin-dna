<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\DumpDatabaseByRootConnectionInterface;
use Illuminate\Console\Command;

class DumpDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump:database {dbname} {filename} {--compress=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dumpa un database';

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
     * @param DumpDatabaseByRootConnectionInterface $dumpDatabaseByRootConnection
     * @return mixed
     */
    public function handle(
        DumpDatabaseByRootConnectionInterface $dumpDatabaseByRootConnection
    ) {
        $dbname = $this->input->getArgument('dbname');
        $filename = $this->input->getArgument('filename');

        $compress = (bool)$this->input->getOption('compress');

        try {
            $dumpDatabaseByRootConnection->execute($dbname, $filename, [], [], $compress);
            $this->output->writeln("<info>Dump effettuato con successo</info>");
        } catch (\Exception $e) {
            $this->output->writeln($e->getMessage());
        }

        return $this;
    }
}
