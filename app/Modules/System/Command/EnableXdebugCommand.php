<?php

namespace App\Modules\System\Command;

use App\Modules\System\Api\CreateWebRootInterface;
use App\Modules\System\Api\EnableXdebugInterface;
use App\Modules\System\Api\GetAvailableNginxConfigsInterface;
use App\Modules\System\Api\GetAvailablePhpFpmConfigsInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class EnableXdebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:enable:xdebug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Abilita XDebug';

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
     * @param EnableXdebugInterface $enableXdebug
     * @param GetAvailablePhpFpmConfigsInterface $getAvailablePhpFpmConfigs
     * @return mixed
     */
    public function handle(
        EnableXdebugInterface $enableXdebug,
        GetAvailablePhpFpmConfigsInterface $getAvailablePhpFpmConfigs
    ) {
        /////////////////////////////
        /// Scelta PHP-FPM
        ///
        $helper = $this->getHelper('question');

        $phpVersions = $getAvailablePhpFpmConfigs->execute();

        $tmp = [];
        foreach ($phpVersions as $phpVersionKey => $phpVersion) {
            $tmp[$phpVersionKey] = $phpVersion['name'];
        }

        $question = new ChoiceQuestion(
            'Quale versione vuoi utilizzare?',
            $tmp,
            $phpVersionKey
        );

        $question->setErrorMessage('La versione %s non è valida.');
        $phpConfPath = $phpVersions[$helper->ask($this->input, $this->output, $question)]['confd'];

        ///
        /// Scelta PHP-FPM
        /////////////////////////////

        $enableXdebug->execute($phpConfPath);
        $this->output->writeln('<info>Abilitato! Riavvia PHP-FPM!</info>');

        return $this;
    }
}
