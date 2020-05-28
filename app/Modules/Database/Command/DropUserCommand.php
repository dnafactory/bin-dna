<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\DropDatabaseInterface;
use App\Modules\Database\Api\DropUserInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DropUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop:user {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancella un utente';

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
     * @param DropUserInterface $dropUser
     * @return mixed
     */
    public function handle(
        DropUserInterface $dropUser
    ) {
        $username = $this->input->getArgument('username');

        try {
            $dropUser->execute($username);
            $this->output->writeln('<info>Utente cancellato con successo: ' . $username . '</info>');
        } catch (\Exception $e) {
            $this->output->writeln('<error>Utente non esistente: ' . $username . '</error>');
        }

        return $this;
    }
}
