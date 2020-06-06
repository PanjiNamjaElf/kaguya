<?php

/**
 * @author   Panji Setya Nur Prawira
 */
if (! function_exists('setting')) {
    /**
     * Get / set the specified setting value.
     *
     * If an array is passed, we'll assume you want to put to the settings.
     *
     * @param  dynamic  key|key,default|null
     * @return mixed|\PanjiNamjaElf\Kaguya\Kaguya
     * @throws \Exception
     */
    function setting()
    {
        $arguments = func_get_args();

        if (empty($arguments)) {
            return app('kaguya');
        }

        if (is_string($arguments[0])) {
            return app('kaguya')->get(...$arguments);
        }

        if (! is_array($arguments[0])) {
            throw new Exception(
                'When setting a value, you must pass an array of key / value pairs.'
            );
        }

        return app('kaguya')->add(key($arguments[0]), reset($arguments[0]), $arguments[1] ?? 'string');
    }
}
