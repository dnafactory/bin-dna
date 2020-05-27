<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\GetAvailableDatabasesInterface;
use App\Modules\Database\Management\GetAvailableConnections;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class ShowDatabasesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show:databases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra tutti i databases';

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
    public function handle(GetAvailableDatabasesInterface $availableDatabases)
    {
        $connections = $availableDatabases->execute();

        foreach ($connections as $connectionName => $connection) {
            $table = new Table($this->output);
            $table->setHeaders(['Connessione', 'Nome Database']);

            foreach ($connection as $databaseName) {
                $table->addRow([$connectionName, $databaseName]);
            }

            $table->render();
        }

        return $this;
    }
}
