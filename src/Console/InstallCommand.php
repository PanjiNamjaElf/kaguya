<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

namespace PanjiNamjaElf\Kaguya\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kaguya:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the kaguya package resources';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Publishing database migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'kaguya-migrations']);

        $this->comment('Publishing assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'kaguya-assets']);

        $this->comment('Publishing configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'kaguya-config']);

        $this->comment('Migrating database...');
        $this->callSilent('migrate', [
            '--path' => '/database/migrations/2020_06_05_064530_create_settings_table.php',
        ]);

        $this->info('Kaguya package installed successfully.');
    }
}
