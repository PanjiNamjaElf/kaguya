<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya\Tests;

class HelpersTest extends TestCase
{
    public function testAddNewSetting()
    {
        setting()->add('app_name', 'Kaguya Package');

        $setting = \DB::table('settings')->where('name', '=', 'app_name')->first();

        $this->assertEquals('Kaguya Package', $setting->value);
    }

    public function testUpdateSetting()
    {
        $this->artisan('kaguya:reset');

        setting()->set('app_name', 'Kaguya-sama');

        $setting = \DB::table('settings')->where('name', '=', 'app_name')->first();

        $this->assertEquals('Kaguya-sama', $setting->value);
    }

    public function testHasSetting()
    {
        setting()->add('app_name', 'Kaguya Package');

        $this->assertTrue(setting()->has('app_name'));
    }

    public function testDeleteSetting()
    {
        $this->artisan('kaguya:reset');

        $this->assertTrue(setting()->delete('app_name'));
    }
}
