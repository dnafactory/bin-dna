<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DropDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop:database {dbname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancella un database';

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
     * @param DropDatabaseInterface $dropDatabase
     * @return mixed
     */
    public function handle(
        DropDatabaseInterface $dropDatabase
    ) {
        $dbname = $this->input->getArgument('dbname');

        try {
            $dropDatabase->execute($dbname);
            $this->output->writeln('<info>Database cancellato con successo: ' . $dbname . '</info>');
        } catch (\Exception $e) {
            $this->output->writeln('<error>Database non esistente: ' . $dbname . '</error>');
        }

        return $this;
    }
}
