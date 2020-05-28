<?php

namespace App\Modules\System\Command;

use App\Modules\System\Api\CreateWebRootInterface;
use App\Modules\System\Api\GetAvailableNginxConfigsInterface;
use App\Modules\System\Api\GetAvailablePhpFpmConfigsInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class CreateWebRootCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:create:webroot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una WebRoot';

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
     * @param GetAvailableNginxConfigsInterface $getAvailableNginxConfigs
     * @param GetAvailablePhpFpmConfigsInterface $getAvailablePhpFpmConfigs
     * @return mixed
     */
    public function handle(
        CreateWebRootInterface $createWebRoot,
        GetAvailableNginxConfigsInterface $getAvailableNginxConfigs,
        GetAvailablePhpFpmConfigsInterface $getAvailablePhpFpmConfigs
    ) {
        /////////////////////////////
        /// Scelta NGINX
        ///

        $helper = $this->getHelper('question');
        $nginxTemplates = $getAvailableNginxConfigs->execute();

        $tmp = [];
        foreach ($nginxTemplates as $nginxTemplateKey => $nginxTemplate) {
            $tmp[$nginxTemplateKey] = $nginxTemplate['name'];
        }

        $question = new ChoiceQuestion(
            'Quale versione vuoi utilizzare?',
            $tmp,
            $nginxTemplateKey
        );

        $question->setErrorMessage('La versione %s non è valida.');
        $nginxTemplate = $nginxTemplates[$helper->ask($this->input, $this->output, $question)]['template'];

        ///
        /// Scelta NGINX
        /////////////////////////////

        $question = new Question('Quale è il dominio del server? [example.dev.dnalab.online]', 'example.dev.dnalab.online');
        $serverName = $helper->ask($this->input, $this->output, $question);

        $question = new Question('Quale è path nel server? [/var/www/example]', '/var/www/example');
        $path = $helper->ask($this->input, $this->output, $question);

        $question = new Question('Quale è il nome del file di nginx? [example.conf]', 'example.conf');
        $nginxFilename = $helper->ask($this->input, $this->output, $question);

        /////////////////////////////
        /// Scelta PHP-FPM
        ///

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
        $phpSocket = $phpVersions[$helper->ask($this->input, $this->output, $question)]['socket'];

        ///
        /// Scelta PHP-FPM
        /////////////////////////////

        $createWebRoot->execute($serverName, $path, $phpSocket, $nginxTemplate, $nginxFilename);

        $this->output->writeln("<info>URL da mappare: $serverName</info>");
        $this->output->writeln("<info>Path sul server: $path</info>");
        $this->output->writeln("<info>Socket usato: $phpSocket</info>");
        $this->output->writeln("<info>Template nginx: $nginxTemplate</info>");
        $this->output->writeln("<error>Ricordati di mappare l\'url!!!</error>");
        $this->output->writeln("<error>Ricordati di riavviare nginx!!!</error>");
    }
}
