<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

namespace PanjiNamjaElf\Kaguya;

class Kaguya
{
    /**
     * Add a settings value.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return bool
     */
    public function add(string $name, $value = null): bool
    {
        if ($this->has($name)) {
            return $this->set($name, $value);
        }

        return Setting::create([
            'name'  => $name,
            'value' => $value,
        ]) ? true : false;
    }

    /**
     * Set a given setting value.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return bool
     */
    public function set(string $name, $value = null): bool
    {
        if ($setting = $this->all()->where('name', $name)->first()) {
            return $setting->update([
                'name'  => $name,
                'value' => $value,
            ]) ? true : false;
        }

        return $this->add($name, $value);
    }

    /**
     * Get the setting value.
     *
     * @param  string  $name
     * @param  string|\Closure|null  $default
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        if ($this->has($name)) {
            return $this->all()->where('name', $name)->first()->value;
        }

        return value($default);
    }

    /**
     * Remove a setting from the storage.
     *
     * @param  string  $name
     * @return bool
     * @throws \Exception
     */
    public function delete(string $name): bool
    {
        if ($this->has($name)) {
            return Setting::whereName($name)->delete();
        }

        return false;
    }

    /**
     * Determine if setting exists in the storage.
     *
     * @param  string  $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return (bool) $this->all()->whereStrict('name', $name)->first();
    }

    /**
     * Remove the settings from cache.
     *
     * @return bool
     * @throws \Exception
     */
    public function flush(): bool
    {
        return cache()->forget('kaguya:settings');
    }

    /**
     * Get all the settings.
     *
     * @return mixed
     */
    protected function all()
    {
        return cache()->rememberForever('kaguya:settings', function () {
            return Setting::all();
        });
    }
}
