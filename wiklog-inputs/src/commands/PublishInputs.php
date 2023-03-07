<?php

namespace Wiklog\WiklogInputs\commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class PublishInputs extends Command
{

    /**
     * @var string
     */
    protected $name = 'wiklog-inputs:publish';

    /**
     * @var string
     */
    protected $description = 'Publie les fichiers inputs';

    public $composer;

    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    public function handle() {
        $component_dir = app_path('View/Components/Inputs');
        $input_component_content = file_get_contents(__DIR__ . '/../components/InputText.php');
        $this->createFile($component_dir . DIRECTORY_SEPARATOR, 'InputText.php', $input_component_content);

        $view_path = resource_path('views/components/inputs');
        $input_view_content = file_get_contents(__DIR__ . '/../components/InputText.php');
        $this->createFile($view_path . DIRECTORY_SEPARATOR, 'InputText.php', $input_view_content);

        $this->info('Inputs publiée');

        $this->composer->dumpOptimized();
        $this->info('Package installé');
    }

    public static function createFile($path, $filename, $contents)
    {
        if (! file_exists($path))
        {
            mkdir($path, 0755, true);
        }
        file_put_contents($path.$filename, $contents);
    }
}
