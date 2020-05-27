<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\GetAvailableConnectionsInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class ShowConnectionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show:connections';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra tutte le connessioni attive nel sistema';

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
     * @param GetAvailableConnectionsInterface $availableConnections
     * @return mixed
     */
    public function handle(GetAvailableConnectionsInterface $availableConnections)
    {
        $connections = $availableConnections->execute();

        $table = new Table($this->output);
        $table->setHeaders(['Host', 'Alias', 'Nome', 'Port', 'Database', 'Username', 'Password']);

        foreach ($connections as $connectionName => $connection) {
            $table->addRow([
                $connection['host'] ?? '-',
                $connectionName,
                $connection['name'] ?? '-',
                $connection['port'] ?? '-',
                $connection['database'] ?? '-',
                $connection['username'] ?? '-',
                $connection['password'] ?? '-',
            ]);
        }

        $table->render();
        return $this;
    }
}
