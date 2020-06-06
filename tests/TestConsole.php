<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya\Tests;

class TestConsole extends TestCase
{
    public function testInstallCommand()
    {
        $this->artisan('kaguya:install')
            ->expectsOutput('Publishing database migrations...')
            ->expectsOutput('Publishing assets...')
            ->expectsOutput('Publishing configuration...')
            ->expectsOutput('Migrating database...')
            ->expectsOutput('Kaguya package installed successfully.')
            ->assertExitCode(0);
    }

    public function testResetCommand()
    {
        $this->artisan('kaguya:reset')
            ->expectsOutput('Settings reset successfully.')
            ->assertExitCode(0);
    }
}
