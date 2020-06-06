<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use PanjiNamjaElf\Kaguya\KaguyaServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            KaguyaServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->setBasePath(__DIR__.'/../');

        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--path'     => realpath(__DIR__.'/database/migrations'),
        ]);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.debug', env('APP_DEBUG', true));
        $app['config']->set('logging.channels.single.path', __DIR__.'/../logs/kaguya_'.date('Y.m.d_His').'.log');
    }
}
