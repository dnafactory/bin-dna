<?php

namespace App\Modules\Database\Command;

use App\Modules\Database\Api\CreateDatabaseInterface;
use App\Modules\Database\Api\CreateUserInterface;
use App\Modules\Database\Api\GrantPermissionInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create:database {dbname} {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un database';

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
     * @param CreateDatabaseInterface $createDatabase
     * @return mixed
     */
    public function handle(
        CreateDatabaseInterface $createDatabase,
        CreateUserInterface $createUser,
        GrantPermissionInterface $grantPermission
    ) {
        $dbname = $this->input->getArgument('dbname');
        $username = $this->input->getArgument('username');

        try {
            $createDatabase->execute($dbname);
            $this->output->writeln('<info>Database creato con successo: ' . $dbname . '</info>');
        } catch (\Exception $e) {
            $this->output->writeln('<error>Database già esistente: ' . $dbname . '</error>');
        }

        try {
            $password = Str::random();
            $createUser->execute($username, $password);
            $this->output->writeln('<info>Utente creato con successo: ' . $username . '</info>');
            $this->output->writeln('<info>Password autogenerata: ' . $password . '</info>');
        } catch (\Exception $e) {
            $this->output->writeln('<error>Utente già esistente: ' . $username . '</error>');
        }

        try {
            $grantPermission->execute($dbname, $username);
        } catch (\Exception $e) {
            $this->output->writeln($e->getMessage());
        }

        return $this;
    }
}
