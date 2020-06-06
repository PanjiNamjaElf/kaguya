<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Ui\UiServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use PanjiNamjaElf\Kaguya\KaguyaServiceProvider;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

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
            UiServiceProvider::class,
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

        $this->app->setBasePath(__DIR__ . '/../');

        $this->artisan('migrate', ['--database' => 'testing']);

        $this->app->make('router')->auth();
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
        $app['config']->set('database.default', 'testing');
        $app['config']->set('logging.channels.single.path', __DIR__ . '/../logs/kaguya_' . date('Y.m.d_His') . '.log');
    }
}
