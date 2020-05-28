<?php

namespace App\Modules\System\Command;

use App\Modules\System\Api\CreateWebRootInterface;
use App\Modules\System\Api\DisableXdebugInterface;
use App\Modules\System\Api\EnableXdebugInterface;
use App\Modules\System\Api\GetAvailableNginxConfigsInterface;
use App\Modules\System\Api\GetAvailablePhpFpmConfigsInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class DisableXdebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:disable:xdebug';

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
     * @param DisableXdebugInterface $disableXdebug
     * @param GetAvailablePhpFpmConfigsInterface $getAvailablePhpFpmConfigs
     * @return mixed
     */
    public function handle(
        DisableXdebugInterface $disableXdebug,
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

        $disableXdebug->execute($phpConfPath);
        $this->output->writeln('<info>Disabilitato! Riavvia PHP-FPM!</info>');

        return $this;
    }
}
