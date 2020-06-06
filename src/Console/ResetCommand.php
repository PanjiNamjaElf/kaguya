<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

namespace PanjiNamjaElf\Kaguya\Console;

use Illuminate\Console\Command;
use PanjiNamjaElf\Kaguya\Setting;

class ResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kaguya:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset all settings to default';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $settings = collect(config('kaguya.settings'))
            ->pluck('fields')
            ->flatten(1)
            ->pluck('value', 'name');

        $settings->each(function ($value, $key) {
            Setting::create([
                'name'  => $key,
                'value' => $value,
            ]);
        });

        $this->info('Settings reset successfully.');
    }
}
