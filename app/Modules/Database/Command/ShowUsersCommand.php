<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\GetAvailableUsersInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class ShowUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra tutti gli utenti';

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
     * @param GetAvailableUsersInterface $availableUsers
     * @return mixed
     */
    public function handle(GetAvailableUsersInterface $availableUsers)
    {
        $users = $availableUsers->execute();

        $table = new Table($this->output);
        $table->setHeaders(['Host', 'User']);

        foreach ($users as $user) {
            $table->addRow([
                $user['host'] ?? '-',
                $user['user'] ?? '-',
            ]);
        }

        $table->render();
        return $this;
    }
}
