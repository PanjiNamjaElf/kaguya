<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

namespace PanjiNamjaElf\Kaguya;

class SettingObserver
{
    /**
     * Handle the setting "created" event.
     *
     * @param  Setting  $setting
     * @return void
     */
    public function created(Setting $setting)
    {
        setting()->flush();
    }

    /**
     * Handle the setting "updated" event.
     *
     * @param  Setting  $setting
     * @return void
     */
    public function updated(Setting $setting)
    {
        setting()->flush();
    }

    /**
     * Handle the setting "deleted" event.
     *
     * @param  Setting  $setting
     * @return void
     */
    public function deleted(Setting $setting)
    {
        setting()->flush();
    }

    /**
     * Handle the setting "restored" event.
     *
     * @param  Setting  $setting
     * @return void
     */
    public function restored(Setting $setting)
    {
        setting()->flush();
    }

    /**
     * Handle the setting "force deleted" event.
     *
     * @param  Setting  $setting
     * @return void
     */
    public function forceDeleted(Setting $setting)
    {
        setting()->flush();
    }
}
